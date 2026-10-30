document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('modalForm');
    if (!form || form.dataset.initialized) return;
    form.dataset.initialized = 'true';
    const config = JSON.parse(document.getElementById('popup-form-config').textContent);
    const phone = form.elements.customer_phone;
    const submit = document.getElementById('modalSubmitBtn');
    const status = document.getElementById('modal-form-status');
    const choices = [...form.querySelectorAll('[name="trademark_types[]"]')];
    let metadata = {};
    let submitting = false;
    const iti = window.intlTelInput ? window.intlTelInput(phone, {
        initialCountry: 'us', separateDialCode: true, nationalMode: true,
        autoInsertDialCode: true, utilsScript: config.utilsUrl,
    }) : null;
    fetch(config.phoneMetadataUrl).then(response => response.json()).then(data => { metadata = data; limitPhone(); }).catch(() => {});
    const countryController = new AbortController();
    const countryTimeout = setTimeout(() => countryController.abort(), 3000);
    fetch('https://ipapi.co/json/', { signal: countryController.signal }).then(response => response.json()).then(data => {
        if (!phone.value && /^[a-z]{2}$/i.test(data.country_code || '')) iti?.setCountry(data.country_code.toLowerCase());
    }).catch(() => {}).finally(() => clearTimeout(countryTimeout));
    function limitedPhone(value) {
        const country = iti?.getSelectedCountryData();
        const rule = metadata[country?.iso2];
        const digits = value.replace(/\D/g, '');
        const international = value.trimStart().startsWith('+');
        const prefix = rule ? (international ? rule.dialCode.length : rule.prefix && digits.startsWith(rule.prefix) ? rule.prefix.length : 0) : 0;
        const max = rule ? rule.max + prefix : 15;
        while (value.replace(/\D/g, '').length > max) {
            const last = value.search(/\d[^\d]*$/);
            if (last < 0) break;
            value = value.slice(0, last).trimEnd();
        }
        return value;
    }
    function limitPhone(event) {
        const original = phone.value;
        const caret = phone.selectionStart;
        const atEnd = caret === null || caret === original.length;
        const digitsBefore = original.slice(0, caret ?? original.length).replace(/\D/g, '').length;
        let value = limitedPhone(original);
        phone.value = value;
        const utils = window.intlTelInputUtils;
        if (value.trim() && iti && utils && !event?.inputType?.startsWith('delete')) {
            const country = iti.getSelectedCountryData();
            const formatted = utils.formatNumber(iti.getNumber(), country.iso2, utils.numberFormat.NATIONAL);
            if (formatted) value = limitedPhone(formatted);
        }
        if (phone.value !== value) {
            phone.value = value;
            if (document.activeElement === phone) {
                let position = value.length;
                if (!atEnd) {
                    let count = 0;
                    position = 0;
                    while (position < value.length && count < digitsBefore) {
                        if (/\d/.test(value[position])) count++;
                        position++;
                    }
                }
                phone.setSelectionRange(position, position);
            }
        }
        updateSubmitButton();
    }
    phone.addEventListener('beforeinput', event => {
        if (!event.data || !/\d/.test(event.data) || !event.inputType.startsWith('insert')) return;
        const proposed = phone.value.slice(0, phone.selectionStart ?? phone.value.length) + event.data + phone.value.slice(phone.selectionEnd ?? phone.value.length);
        if (event.data.length === 1 && limitedPhone(proposed) !== proposed) event.preventDefault();
    });
    phone.addEventListener('input', limitPhone);
    phone.addEventListener('countrychange', limitPhone);
    phone.addEventListener('blur', () => limitPhone());
    iti?.promise.then(limitPhone).catch(() => {});
    function updateDetails() {
        form.querySelectorAll('[data-trademark-field]').forEach(group => {
            const selected = choices.some(choice => choice.checked && choice.value === group.dataset.trademarkField);
            const input = group.querySelector('input');
            group.hidden = !selected;
            input.disabled = !selected;
            input.required = selected;
            if (!selected) input.value = '';
        });
        updateSubmitButton();
    }
    choices.forEach(choice => choice.addEventListener('change', updateDetails));
    form.addEventListener('reset', () => setTimeout(updateDetails));
    updateDetails();
    function phoneIsValid() {
        const number = iti && window.intlTelInputUtils ? iti.getNumber() : phone.value.replace(/[^+0-9]/g, '');
        return /^\+?[1-9][0-9]{6,14}$/.test(number) && (!(iti && window.intlTelInputUtils) || iti.isValidNumber());
    }
    function logoIsValid() {
        const input = form.elements.logo;
        const file = input.files[0];
        return input.disabled || !!(file && file.size <= 5 * 1024 * 1024 && /\.(jpe?g|png|webp)$/i.test(file.name));
    }
    function updateSubmitButton() {
        const required = [...form.querySelectorAll('[required]')].filter(input => !input.disabled);
        submit.disabled = submitting || !choices.some(choice => choice.checked) ||
            !required.every(input => input.validity.valid && input.value.trim()) ||
            !phoneIsValid() || !logoIsValid() || !!form.querySelector('[aria-invalid="true"]');
    }
    form.addEventListener('change', updateSubmitButton);
    form.addEventListener('reset', () => setTimeout(updateSubmitButton));
    function showError(field, message) {
        const error = [...form.querySelectorAll('[data-error]')].find(el => el.dataset.error === field.split('.')[0]);
        if (error) error.textContent = message;
        const input = form.elements.namedItem(field);
        if (input?.setAttribute) input.setAttribute('aria-invalid', 'true');
    }
    form.addEventListener('input', event => {
        event.target.removeAttribute('aria-invalid');
        const error = [...form.querySelectorAll('[data-error]')].find(el => el.dataset.error === event.target.name);
        if (error) error.textContent = '';
        updateSubmitButton();
    });
    form.addEventListener('submit', async event => {
        event.preventDefault();
        if (submit.disabled) return;
        form.querySelectorAll('[data-error]').forEach(error => error.textContent = '');
        form.querySelectorAll('[aria-invalid]').forEach(input => input.removeAttribute('aria-invalid'));
        if (!choices.some(choice => choice.checked)) {
            showError('trademark_types', 'Select at least one trademark option.');
            choices[0].focus(); return;
        }
        if (!form.reportValidity()) return;
        const logo = form.elements.logo.files[0];
        if (!form.elements.logo.disabled && logo && (logo.size > 5 * 1024 * 1024 || !/\.(jpe?g|png|webp)$/i.test(logo.name))) {
            showError('logo', 'Upload a JPG, PNG or WebP image up to 5 MB.'); return;
        }
        const fullPhone = iti && window.intlTelInputUtils ? iti.getNumber() : phone.value.replace(/[^+0-9]/g, '');
        if ((iti && window.intlTelInputUtils && !iti.isValidNumber()) || !/^\+?[1-9][0-9]{6,14}$/.test(fullPhone)) {
            showError('customer_phone', 'Enter a valid phone number for the selected country.'); phone.focus(); return;
        }
        submitting = true;
        submit.disabled = true;
        const originalText = submit.textContent;
        submit.textContent = 'Sending...'; status.textContent = '';
        try {
            if (!window.grecaptcha || !config.sitekey) throw new Error('Verification is unavailable. Please try again or contact support.');
            const token = await Promise.race([
                new Promise((resolve, reject) => grecaptcha.ready(() => grecaptcha.execute(config.sitekey, {action: 'modal_form'}).then(resolve, reject))),
                new Promise((_, reject) => setTimeout(() => reject(new Error('Verification timed out. Please try again.')), 15000)),
            ]);
            const data = new FormData(form);
            data.set('customer_phone', fullPhone);
            data.set('g-recaptcha-response', token);
            const response = await fetch(form.action, { method: 'POST', headers: {'Accept':'application/json'}, body: data });
            const result = await response.json();
            if (!response.ok || !result.success) {
                Object.entries(result.errors || {}).forEach(([field, errors]) => showError(field, errors[0]));
                form.querySelector('[aria-invalid="true"]')?.focus();
                throw new Error(result.message || 'Please check your details and try again.');
            }
            window.location.assign(result.redirect);
        } catch (error) {
            status.textContent = error.message || 'Unable to send your request. Please try again.';
            submitting = false;
            submit.textContent = originalText;
            updateSubmitButton();
        }
    });
    updateSubmitButton();
});
