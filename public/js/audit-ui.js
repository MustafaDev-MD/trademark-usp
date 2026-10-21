document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('fcmp-modal-wrapper');
  const form = document.getElementById('modalForm');
  let opener;
  function close() { modal.style.display = 'none'; document.body.style.overflow = ''; opener?.focus(); }
  document.querySelectorAll('.fcmp-trigger-button').forEach(button => {
    button.onclick = event => {
      event.preventDefault(); opener = button;
      const plan = button.dataset.plan || '';
      document.getElementById('inquiry-plan').value = plan;
      const applicationLink=document.getElementById('application-start');
      applicationLink.href=plan ? window.inquiryConfig.startUrl+'/'+encodeURIComponent(plan) : window.inquiryConfig.registerUrl;
      document.getElementById('selected-package').textContent = plan ? `${plan.charAt(0).toUpperCase()+plan.slice(1)} package: starting service fee $${button.dataset.price}. Due now for this inquiry: $0. ${window.inquiryConfig.packages[plan]?.includes || ''}. Any legal service requires provider acceptance and a separate agreement.` : 'General service inquiry. Due now: $0.';
      modal.style.display = 'flex'; document.body.style.overflow = 'hidden';
      document.getElementById('inquiry-customer_full_name').focus();
    };
  });
  document.getElementById('fcmp-close')?.addEventListener('click', close);
  modal?.addEventListener('click', event => { if(event.target === modal) close(); });
  modal?.addEventListener('keydown', event => {
    if(event.key === 'Escape') close();
    if(event.key !== 'Tab') return;
    const items = [...modal.querySelectorAll('button, a[href], input:not([type="hidden"]), textarea')].filter(el => el.offsetParent !== null && !el.disabled);
    const first = items[0], last = items[items.length-1];
    if(event.shiftKey && document.activeElement === first) {event.preventDefault();last.focus();}
    else if(!event.shiftKey && document.activeElement === last) {event.preventDefault();first.focus();}
  });
  form?.addEventListener('submit', async event => {
    event.preventDefault(); if(!form.reportValidity()) return;
    const status = document.getElementById('inquiry-status');
    const submit = document.getElementById('modalSubmitBtn');
    form.querySelectorAll('.text-danger').forEach(el=>el.textContent='');
    submit.disabled=true;status.textContent='Sending inquiry...';
    try {
      if(!window.grecaptcha || !window.inquiryConfig.sitekey) throw new Error('Verification is unavailable. Please try again or contact support.');
      await new Promise(resolve => grecaptcha.ready(resolve));
      const token = await grecaptcha.execute(window.inquiryConfig.sitekey,{action:'modal_form'});
      form.elements['g-recaptcha-response'].value=token;
      const response=await fetch(form.action,{method:'POST',headers:{'Accept':'application/json'},body:new FormData(form)});
      const data=await response.json();
      if(!response.ok || !data.success) {
        Object.entries(data.errors || {}).forEach(([field,messages])=>{
          const error=document.getElementById('error-'+field); if(error) error.textContent=messages[0];
        });
        throw new Error(data.message || 'Please check your details and try again.');
      }
      window.location.assign(data.redirect);
    } catch(error) {status.textContent=error.message || 'Unable to send. Please try again.';submit.disabled=false;}
  });
  // Keep the existing tracking containers without the removed preference dialog.
  function loadAnalytics() {
    const ids=window.trackingConfig?.gtmIds || [];
    ids.forEach(id => {
    if(!/^GTM-[A-Z0-9]+$/.test(id || '') || window.uspAnalyticsLoaded?.includes(id)) return;
    window.uspAnalyticsLoaded=window.uspAnalyticsLoaded || [];
    window.uspAnalyticsLoaded.push(id);
    window.dataLayer=window.dataLayer || [];
    window.dataLayer.push({'gtm.start':Date.now(),event:'gtm.js'});
    const script=document.createElement('script');script.async=true;
    script.src='https://www.googletagmanager.com/gtm.js?id='+encodeURIComponent(id);document.head.appendChild(script);
    });
  }
  const banner = document.getElementById('privacy-settings');
  const checkbox = document.getElementById('analytics-consent');
  const key = 'trademarkusp-privacy-v1';
  let saved = null;
  try { saved = JSON.parse(localStorage.getItem(key)); } catch (error) {}
  let privacyOpener;
  function openPreferences() {
    if (!banner) return;
    checkbox.checked = saved?.analytics === true;
    banner.hidden = false;
  }
  function closePreferences() { banner.hidden = true; privacyOpener?.focus(); }
  document.querySelectorAll('[data-privacy-settings]').forEach(button => button.addEventListener('click', () => {
    privacyOpener = button;
    openPreferences();
    checkbox.focus();
  }));
  document.getElementById('privacy-close')?.addEventListener('click', closePreferences);
  banner?.addEventListener('keydown', event => { if (event.key === 'Escape') closePreferences(); });
  function savePreferences(analytics) {
    try { localStorage.setItem(key, JSON.stringify({analytics, updated: new Date().toISOString()})); }
    catch (error) {
      const status = document.getElementById('privacy-status');
      status.hidden = false;
      status.textContent = 'Unable to save preferences. Please enable browser storage and try again.';
      return;
    }
    saved = {analytics};
    closePreferences();
    if (analytics) loadAnalytics();
    else if (window.uspAnalyticsLoaded?.length) window.location.reload();
  }
  document.getElementById('privacy-save')?.addEventListener('click', () => savePreferences(checkbox.checked));
  document.getElementById('privacy-reject')?.addEventListener('click', () => savePreferences(false));
  if (saved?.analytics === true) loadAnalytics();
  if (!saved) openPreferences();
});
