document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('fcmp-modal-wrapper');
  const closeButton = document.getElementById('fcmp-close');
  let opener;
  let autoOpenTimer;
  function closeModal() { clearTimeout(autoOpenTimer); if (modal) { modal.style.display = 'none'; modal.setAttribute('aria-hidden', 'true'); } document.body.style.overflow = ''; opener?.focus(); }
  function openModal(button = null) {
    clearTimeout(autoOpenTimer);
    if (!modal) return;
    opener = button || document.activeElement;
    const payButton = document.getElementById('modalPayNowBtn');
    if (payButton) {
      payButton.style.display = button?.dataset.paymentUrl ? 'inline-flex' : 'none';
      payButton.href = button?.dataset.paymentUrl || 'javascript:void(0);';
    }
    document.getElementById('modal-selected-plan').value = button?.dataset.plan || '';
    modal.style.display = 'flex';
    modal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    document.getElementById('fcmp-modal').scrollTop = 0;
    document.getElementById('inquiry-first-name')?.focus({preventScroll: true});
  }
  document.querySelectorAll('.fcmp-trigger-button').forEach(button => {
    button.onclick = event => { event.preventDefault(); openModal(button); };
  });
  // Wait briefly on every page; manual opening or dismissal cancels this timer.
  autoOpenTimer = setTimeout(() => openModal(), 3500);
  closeButton?.addEventListener('click', closeModal);
  modal?.addEventListener('click', event => { if (event.target === modal) closeModal(); });
  document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && modal?.style.display === 'flex') closeModal();
  });
  modal?.addEventListener('keydown', event => {
    if (event.key !== 'Tab') return;
    const fields = [...modal.querySelectorAll('a[href], button, input:not([type="hidden"]), textarea, [tabindex="0"]')].filter(el => !el.disabled && el.offsetParent !== null);
    const first = fields[0], last = fields[fields.length - 1];
    if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last?.focus(); }
    else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first?.focus(); }
  });
  // The primary GTM container loads in the head; optional containers load when analytics is allowed.
  function loadAnalytics() {
    const ids=JSON.parse(document.getElementById('tracking-config')?.textContent || '{}').gtmIds || [];
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
  const seenKey = 'trademarkusp-privacy-seen-v1';
  let saved = null;
  let alreadyShown = false;
  try {
    saved = JSON.parse(localStorage.getItem(key));
    alreadyShown = localStorage.getItem(seenKey) === '1';
  } catch (error) {}
  alreadyShown = alreadyShown || document.cookie.split('; ').includes(seenKey + '=1');
  let privacyOpener;
  function openPreferences() {
    if (!banner) return;
    checkbox.checked = saved?.analytics === true;
    banner.hidden = false;
    try { localStorage.setItem(seenKey, '1'); } catch (error) {}
    document.cookie = seenKey + '=1; Max-Age=31536000; Path=/; SameSite=Lax' + (location.protocol === 'https:' ? '; Secure' : '');
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
  if (!saved && !alreadyShown) openPreferences();
});
