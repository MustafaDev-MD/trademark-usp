# Website audit remediation — 21 October 2026

Implemented in the local Laravel project. This is not a production deployment or a legal/provider verification.

| Finding | Implementation and remaining acceptance |
| --- | --- |
| U01 | Removed the Terms placeholder and linked the maintained Privacy Policy. |
| U02 | Replaced malformed/other-brand privacy emails with the existing published legal@trademarkusp.com support contact. Mailbox routing, EU/UK representative identity and the rest of the policy still require owner verification. |
| U03 | Added package disclosure: software/filing support, separate attorney agreement, provider acceptance and scope. Changed misleading first-party attorney references. Existing named provider and affiliations retained at the user's request; not independently verified. |
| U04 | Removed unsupported numerical review/Forbes endorsements from inspected sales templates. No replacement review statistics were invented. Existing testimonials and content permissions still need owner evidence. |
| U05 | Popup names the package, starting service fee, included work and $0 due for inquiry. Removed disconnected external payment links. Separate application link preserves plan in the session through registration; application records and server-created Stripe sessions link payments to the authenticated owner. Shared public/wizard plan fees are $49/$199/$349. Government fees and extras are explicitly separate. Signed callbacks check session, owner, currency and amount; repeated callbacks do not apply twice. Payment confirmation waits for the verified callback. Real Stripe sandbox success/failure/cancellation remains a release check. |
| U06 | Added distinct descriptions for public canonical templates and noindex for account/utility pages using the SEO partial. |
| U07 | Promoted the first real heading on pages missing H1; extended heading CSS to preserve appearance. Added login H1. |
| U08 | Unique article titles derive from the visible topic. Existing article URLs retained. |
| U09 | Shared canonical, Open Graph, Twitter and WebPage JSON-LD metadata. No unverified ratings or organization claims in schema. |
| U10 | /sitemap.xml lists an explicit public-page allowlist. Both robots files advertise the production sitemap. Search Console submission requires account access. |
| U11 | Trial wording retained unchanged at the user's request. Disclosure requires confirmation of trial terms before enrollment. Duration, renewal pricing and billing agreement remain unresolved business inputs. |
| U12 | Associated labels, named dialog, keyboard focus entry/trap/return, Escape, policy links, validation feedback and truthful server success. Automated desktop/mobile checks completed. Full screen-reader audit remains unperformed. |
| U13 | Footer opens persistent preferences. Optional GTM tags require opt-in; revocation reloads the document to stop loaded scripts. Necessary application cookies and existing support chat/CAPTCHA remain operational. Existing analytics cookies are not actively purged; third-party tag configuration and data practices require account review. |
| U14 | Destination bylines/dates/read times and homepage card metadata use shared article records based on existing destination content. Authorship/permissions not independently verified. |
| U15 | Service panels link to registration, office-action, copyright and monitoring pages, with matching labels. |
| U16 | Dynamic copyright year. Existing company names and conflicting contact/footer hours retained at the user's request. |
| U17 | Added nosniff, framing, referrer and permissions headers, HTTPS-only HSTS, and report-only CSP. Apache unsets X-Powered-By, including static responses. Hosting/CDN behavior, expose_php=Off and CSP integration/report collection remain deployment checks. |
| U18 | Existing three GTM IDs retained at the user's request. Centralized consent-controlled loading removes noscript bypasses and guards each loader. Container owners/tags and conversion overlap cannot be established from source alone. |

## Validation

Final automated suite: 34 tests passed, 462 assertions.

- Automated feature coverage: every configured public route renders SEO metadata, a meaningful H1 and defensive headers; sitemap XML excludes account/payment routes.
- Controlled inquiry tests use fake HTTP CAPTCHA responses and fake email delivery; no real lead notification was sent.
- Signed webhook tests cover payment success, mismatched amount, unpaid completion, duplicate events, invalid signatures and unauthorized confirmation. Discounts are not subtracted twice and payment does not mark a trademark legally approved.
- Browser checks at desktop and 390px mobile: Premium $349/$0 inquiry summary, dialog open/close, Escape and focus restoration, persistent rejected analytics choice, no page JavaScript errors.
- No live payment, full performance benchmark, authoritative search-accuracy comparison, legal review or production release performed.

## Release

1. Back up source/database. Deploy source changes and run `php artisan migrate --force` to create `payment_checkouts` (already created on this local MySQL database).
2. Configure the production APP_URL as the canonical HTTPS origin. Clear/rebuild Laravel views/config on deployment so stale tracked compiled templates cannot override the new source: `php artisan optimize:clear`, then the normal production cache build.
3. Review and complete any older checkout sessions before switching webhook handling: unrecorded sessions are intentionally rejected. New checkouts are stored before redirecting the customer.
4. Validate Stripe test-mode sessions for all packages, failures, cancellation, delayed success and retries. Confirm the webhook points to `/api/stripe/webhook` with the correct signing secret.
5. Verify real CAPTCHA keys support the deployed host, email delivery and privacy mailbox routing. Localhost is not authorized by the existing live reCAPTCHA site key; CAPTCHA was mocked in tests.
6. Verify headers at Apache/CDN, turn `expose_php` off in the production PHP configuration, inspect CSP reports before enforcing a stricter policy, and recheck chat/payment/CAPTCHA integrations.
7. Review the retained business facts, trial terms, claims permissions and three analytics containers when the owner is ready. Submit the sitemap to Search Console and recheck production after caches refresh.

Rollback requires restoring the previous release and clearing compiled views. Preserve the payment ledger and database backup; do not drop paid transaction records during a rollback.

## Follow-up change

The user requested removal of the custom Privacy Settings feature. The dialog, footer control and preference storage code were removed. Existing GTM containers now load without that custom consent gate, preserving the earlier tracking behavior. The previous U13 implementation and consent verification above are historical and no longer describe the current build.
