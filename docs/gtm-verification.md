# GTM verification — 22 October 2026

Status: source and public container inspection completed; ownership and actual conversion firing remain unverified. No container was removed or disabled.

| Container | Public gtm.js | Google Ads destination IDs present in public script | Owner |
| --- | --- | --- | --- |
| GTM-TSBJ4J7T | HTTP 200 | AW-17674419931, AW-7353263491 | Unverified |
| GTM-5QQV3FW6 | HTTP 200 | AW-17674248854, AW-17674419931 | Unverified |
| GTM-WSH7VPQM | HTTP 200 | AW-17674248854 | Unverified |

These are static string matches in publicly served container JavaScript, not a decoded tag inventory or proof of tag execution. Shared destination IDs identify areas to review; they do not prove duplicate conversions. Different conversion labels, triggers and configurations may be intentional.

Local implementation has one consent-controlled loader in public/js/audit-ui.js with a per-container loading guard. All three configured containers use the same dataLayer. public/js/home.js also contains two legacy hardcoded container loaders, but no reference to that file was found in the searched application templates/scripts. It is not loaded by the inspected main layout. No explicit application-generated purchase or generate_lead dataLayer push was found in the searched app, route, view or public JavaScript sources; GTM may still define DOM/form/click-based triggers.

Required closure evidence:

1. Account/container owner or admin verifies each container's owner, purpose, published version and Google Ads/GA destinations in GTM.
2. Use GTM Preview/Tag Assistant on authorized staging/test destinations. For a single controlled lead success, count outgoing conversion requests by destination AND conversion label. Repeat for validation errors/retries; they must not count successful leads.
3. Verify payment success in test mode, including cancellation, delayed completion and repeated callbacks. Correlate transaction/order IDs; backend callback idempotency does not establish analytics deduplication.
4. Test consent absent, allowed and revoked. Record the page URL, container versions, trigger, destination, label and count for each action. Avoid polluting production conversions with synthetic actions.
5. Remove a container/tag only after this evidence identifies it as obsolete or redundant.

No real customer lead, purchase or production conversion action was submitted for this inspection. Public script fetches cannot reveal account ownership. GTM/Tag Assistant and destination account access are needed to complete the remaining checks.
