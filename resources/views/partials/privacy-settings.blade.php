<section id="privacy-settings" class="privacy-banner" role="region" aria-labelledby="privacy-heading" hidden>
    <div class="privacy-banner-inner">
        <div class="privacy-banner-copy">
            <h2 id="privacy-heading">Your privacy matters</h2>
            <p>We use essential cookies to keep this website working. You can choose whether to allow optional analytics. <a href="{{ route('privacy-policy') }}">Privacy Policy</a></p>
            <label class="privacy-choice"><input type="checkbox" id="analytics-consent"> Allow optional analytics</label>
            <p id="privacy-status" role="status" hidden></p>
        </div>
        <div class="privacy-banner-actions">
            <button type="button" id="privacy-reject" class="privacy-button privacy-button-secondary">Essential only</button>
            <button type="button" id="privacy-save" class="privacy-button privacy-button-primary">Save preferences</button>
        </div>
        <button type="button" id="privacy-close" class="privacy-banner-close" aria-label="Close privacy settings">&times;</button>
    </div>
</section>
