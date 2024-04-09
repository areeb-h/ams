<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>

{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

    <style>
        /*@import 'flatpickr/dist/flatpickr.css';*/

        /*! tailwindcss v3.4.3 | MIT License | https://tailwindcss.com*/

        /*
1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
*/

        *,
        ::before,
        ::after {
            box-sizing: border-box;
            /* 1 */
            border-width: 0;
            /* 2 */
            border-style: solid;
            /* 2 */
            border-color: #E5E7EB;
            /* 2 */
        }

        ::before,
        ::after {
            --tw-content: '';
        }

        /*
1. Use a consistent sensible line-height in all browsers.
2. Prevent adjustments of font size after orientation changes in iOS.
3. Use a more readable tab size.
4. Use the user's configured `sans` font-family by default.
5. Use the user's configured `sans` font-feature-settings by default.
6. Use the user's configured `sans` font-variation-settings by default.
7. Disable tap highlights on iOS
*/

        html,
        :host {
            line-height: 1.5;
            /* 1 */
            -webkit-text-size-adjust: 100%;
            /* 2 */
            -moz-tab-size: 4;
            /* 3 */
            -o-tab-size: 4;
            tab-size: 4;
            /* 3 */
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            /* 4 */
            font-feature-settings: normal;
            /* 5 */
            font-variation-settings: normal;
            /* 6 */
            -webkit-tap-highlight-color: transparent;
            /* 7 */
        }

        /*
1. Remove the margin in all browsers.
2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
*/

        body {
            margin: 0;
            /* 1 */
            line-height: inherit;
            /* 2 */
        }

        /*
1. Add the correct height in Firefox.
2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
3. Ensure horizontal rules are visible by default.
*/

        hr {
            height: 0;
            /* 1 */
            color: inherit;
            /* 2 */
            border-top-width: 1px;
            /* 3 */
        }

        /*
Add the correct text decoration in Chrome, Edge, and Safari.
*/

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
        }

        /*
Remove the default font size and weight for headings.
*/

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit;
        }

        /*
Reset links to optimize for opt-in styling instead of opt-out.
*/

        a {
            color: inherit;
            text-decoration: inherit;
        }

        /*
Add the correct font weight in Edge and Safari.
*/

        b,
        strong {
            font-weight: bolder;
        }

        /*
1. Use the user's configured `mono` font-family by default.
2. Use the user's configured `mono` font-feature-settings by default.
3. Use the user's configured `mono` font-variation-settings by default.
4. Correct the odd `em` font sizing in all browsers.
*/

        code,
        kbd,
        samp,
        pre {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            /* 1 */
            font-feature-settings: normal;
            /* 2 */
            font-variation-settings: normal;
            /* 3 */
            font-size: 1em;
            /* 4 */
        }

        /*
Add the correct font size in all browsers.
*/

        small {
            font-size: 80%;
        }

        /*
Prevent `sub` and `sup` elements from affecting the line height in all browsers.
*/

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline;
        }

        sub {
            bottom: -0.25em;
        }

        sup {
            top: -0.5em;
        }

        /*
1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
3. Remove gaps between table borders by default.
*/

        table {
            text-indent: 0;
            /* 1 */
            border-color: inherit;
            /* 2 */
            border-collapse: collapse;
            /* 3 */
        }

        /*
1. Change the font styles in all browsers.
2. Remove the margin in Firefox and Safari.
3. Remove default padding in all browsers.
*/

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            /* 1 */
            font-feature-settings: inherit;
            /* 1 */
            font-variation-settings: inherit;
            /* 1 */
            font-size: 100%;
            /* 1 */
            font-weight: inherit;
            /* 1 */
            line-height: inherit;
            /* 1 */
            letter-spacing: inherit;
            /* 1 */
            color: inherit;
            /* 1 */
            margin: 0;
            /* 2 */
            padding: 0;
            /* 3 */
        }

        /*
Remove the inheritance of text transform in Edge and Firefox.
*/

        button,
        select {
            text-transform: none;
        }

        /*
1. Correct the inability to style clickable types in iOS and Safari.
2. Remove default button styles.
*/

        button,
        input:where([type='button']),
        input:where([type='reset']),
        input:where([type='submit']) {
            -webkit-appearance: button;
            /* 1 */
            background-color: transparent;
            /* 2 */
            background-image: none;
            /* 2 */
        }

        /*
Use the modern Firefox focus style for all focusable elements.
*/

        :-moz-focusring {
            outline: auto;
        }

        /*
Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
*/

        :-moz-ui-invalid {
            box-shadow: none;
        }

        /*
Add the correct vertical alignment in Chrome and Firefox.
*/

        progress {
            vertical-align: baseline;
        }

        /*
Correct the cursor style of increment and decrement buttons in Safari.
*/

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto;
        }

        /*
1. Correct the odd appearance in Chrome and Safari.
2. Correct the outline style in Safari.
*/

        [type='search'] {
            -webkit-appearance: textfield;
            /* 1 */
            outline-offset: -2px;
            /* 2 */
        }

        /*
Remove the inner padding in Chrome and Safari on macOS.
*/

        ::-webkit-search-decoration {
            -webkit-appearance: none;
        }

        /*
1. Correct the inability to style clickable types in iOS and Safari.
2. Change font properties to `inherit` in Safari.
*/

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            /* 1 */
            font: inherit;
            /* 2 */
        }

        /*
Add the correct display in Chrome and Safari.
*/

        summary {
            display: list-item;
        }

        /*
Removes the default spacing and border for appropriate elements.
*/

        blockquote,
        dl,
        dd,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        figure,
        p,
        pre {
            margin: 0;
        }

        fieldset {
            margin: 0;
            padding: 0;
        }

        legend {
            padding: 0;
        }

        ol,
        ul,
        menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        /*
Reset default styling for dialogs.
*/

        dialog {
            padding: 0;
        }

        /*
Prevent resizing textareas horizontally by default.
*/

        textarea {
            resize: vertical;
        }

        /*
1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
2. Set the default placeholder color to the user's configured gray 400 color.
*/

        input::-moz-placeholder, textarea::-moz-placeholder {
            opacity: 1;
            /* 1 */
            color: #9CA3AF;
            /* 2 */
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            /* 1 */
            color: #9CA3AF;
            /* 2 */
        }

        /*
Set the default cursor for buttons.
*/

        button,
        [role="button"] {
            cursor: pointer;
        }

        /*
Make sure disabled buttons don't get the pointer cursor.
*/

        :disabled {
            cursor: default;
        }

        /*
1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
   This can trigger a poorly considered lint error in some tools but is included by design.
*/

        img,
        svg,
        video,
        canvas,
        audio,
        iframe,
        embed,
        object {
            display: block;
            /* 1 */
            vertical-align: middle;
            /* 2 */
        }

        /*
Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
*/

        img,
        video {
            max-width: 100%;
            height: auto;
        }

        /* Make elements with the HTML hidden attribute stay hidden by default */

        [hidden] {
            display: none;
        }

        [type='text'],input:where(:not([type])),[type='email'],[type='url'],[type='password'],[type='number'],[type='date'],[type='datetime-local'],[type='month'],[type='search'],[type='tel'],[type='time'],[type='week'],[multiple],textarea,select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #fff;
            border-color: #6B7280;
            border-width: 1px;
            border-radius: 0px;
            padding-top: 0.5rem;
            padding-right: 0.75rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5rem;
            --tw-shadow: 0 0 #0000;
        }

        [type='text']:focus, input:where(:not([type])):focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #1C64F2;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            border-color: #1C64F2;
        }

        input::-moz-placeholder, textarea::-moz-placeholder {
            color: #6B7280;
            opacity: 1;
        }

        input::placeholder,textarea::placeholder {
            color: #6B7280;
            opacity: 1;
        }

        ::-webkit-datetime-edit-fields-wrapper {
            padding: 0;
        }

        ::-webkit-date-and-time-value {
            min-height: 1.5em;
            text-align: inherit;
        }

        ::-webkit-datetime-edit {
            display: inline-flex;
        }

        ::-webkit-datetime-edit,::-webkit-datetime-edit-year-field,::-webkit-datetime-edit-month-field,::-webkit-datetime-edit-day-field,::-webkit-datetime-edit-hour-field,::-webkit-datetime-edit-minute-field,::-webkit-datetime-edit-second-field,::-webkit-datetime-edit-millisecond-field,::-webkit-datetime-edit-meridiem-field {
            padding-top: 0;
            padding-bottom: 0;
        }

        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        [multiple],[size]:where(select:not([size="1"])) {
            background-image: initial;
            background-position: initial;
            background-repeat: unset;
            background-size: initial;
            padding-right: 0.75rem;
            -webkit-print-color-adjust: unset;
            print-color-adjust: unset;
        }

        [type='checkbox'],[type='radio'] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            flex-shrink: 0;
            height: 1rem;
            width: 1rem;
            color: #1C64F2;
            background-color: #fff;
            border-color: #6B7280;
            border-width: 1px;
            --tw-shadow: 0 0 #0000;
        }

        [type='checkbox'] {
            border-radius: 0px;
        }

        [type='radio'] {
            border-radius: 100%;
        }

        [type='checkbox']:focus,[type='radio']:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
            --tw-ring-offset-width: 2px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #1C64F2;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
        }

        [type='checkbox']:checked,[type='radio']:checked {
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        [type='checkbox']:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
        }

        @media (forced-colors: active)  {
            [type='checkbox']:checked {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto;
            }
        }

        [type='radio']:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
        }

        @media (forced-colors: active)  {
            [type='radio']:checked {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto;
            }
        }

        [type='checkbox']:checked:hover,[type='checkbox']:checked:focus,[type='radio']:checked:hover,[type='radio']:checked:focus {
            border-color: transparent;
            background-color: currentColor;
        }

        [type='checkbox']:indeterminate {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
            border-color: transparent;
            background-color: currentColor;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        @media (forced-colors: active)  {
            [type='checkbox']:indeterminate {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto;
            }
        }

        [type='checkbox']:indeterminate:hover,[type='checkbox']:indeterminate:focus {
            border-color: transparent;
            background-color: currentColor;
        }

        [type='file'] {
            background: unset;
            border-color: inherit;
            border-width: 0;
            border-radius: 0;
            padding: 0;
            font-size: unset;
            line-height: inherit;
        }

        [type='file']:focus {
            outline: 1px solid ButtonText;
            outline: 1px auto -webkit-focus-ring-color;
        }

        [data-tooltip-style^='light'] + .tooltip > .tooltip-arrow:before {
            border-style: solid;
            border-color: #e5e7eb;
        }

        [data-tooltip-style^='light'] + .tooltip[data-popper-placement^='top'] > .tooltip-arrow:before {
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        [data-tooltip-style^='light'] + .tooltip[data-popper-placement^='right'] > .tooltip-arrow:before {
            border-bottom-width: 1px;
            border-left-width: 1px;
        }

        [data-tooltip-style^='light'] + .tooltip[data-popper-placement^='bottom'] > .tooltip-arrow:before {
            border-top-width: 1px;
            border-left-width: 1px;
        }

        [data-tooltip-style^='light'] + .tooltip[data-popper-placement^='left'] > .tooltip-arrow:before {
            border-top-width: 1px;
            border-right-width: 1px;
        }

        .tooltip[data-popper-placement^='top'] > .tooltip-arrow {
            bottom: -4px;
        }

        .tooltip[data-popper-placement^='bottom'] > .tooltip-arrow {
            top: -4px;
        }

        .tooltip[data-popper-placement^='left'] > .tooltip-arrow {
            right: -4px;
        }

        .tooltip[data-popper-placement^='right'] > .tooltip-arrow {
            left: -4px;
        }

        .tooltip.invisible > .tooltip-arrow:before {
            visibility: hidden;
        }

        [data-popper-arrow],[data-popper-arrow]:before {
            position: absolute;
            width: 8px;
            height: 8px;
            background: inherit;
        }

        [data-popper-arrow] {
            visibility: hidden;
        }

        [data-popper-arrow]:before {
            content: "";
            visibility: visible;
            transform: rotate(45deg);
        }

        [data-popper-arrow]:after {
            content: "";
            visibility: visible;
            transform: rotate(45deg);
            position: absolute;
            width: 9px;
            height: 9px;
            background: inherit;
        }

        [role="tooltip"] > [data-popper-arrow]:before {
            border-style: solid;
            border-color: #e5e7eb;
        }

        .dark [role="tooltip"] > [data-popper-arrow]:before {
            border-style: solid;
            border-color: #4b5563;
        }

        [role="tooltip"] > [data-popper-arrow]:after {
            border-style: solid;
            border-color: #e5e7eb;
        }

        .dark [role="tooltip"] > [data-popper-arrow]:after {
            border-style: solid;
            border-color: #4b5563;
        }

        [data-popover][role="tooltip"][data-popper-placement^='top'] > [data-popper-arrow]:before {
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='top'] > [data-popper-arrow]:after {
            border-bottom-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='right'] > [data-popper-arrow]:before {
            border-bottom-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='right'] > [data-popper-arrow]:after {
            border-bottom-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='bottom'] > [data-popper-arrow]:before {
            border-top-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='bottom'] > [data-popper-arrow]:after {
            border-top-width: 1px;
            border-left-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='left'] > [data-popper-arrow]:before {
            border-top-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='left'] > [data-popper-arrow]:after {
            border-top-width: 1px;
            border-right-width: 1px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='top'] > [data-popper-arrow] {
            bottom: -5px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='bottom'] > [data-popper-arrow] {
            top: -5px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='left'] > [data-popper-arrow] {
            right: -5px;
        }

        [data-popover][role="tooltip"][data-popper-placement^='right'] > [data-popper-arrow] {
            left: -5px;
        }

        [role="tooltip"].invisible > [data-popper-arrow]:before {
            visibility: hidden;
        }

        [role="tooltip"].invisible > [data-popper-arrow]:after {
            visibility: hidden;
        }

        [type='text'],[type='email'],[type='url'],[type='password'],[type='number'],[type='date'],[type='datetime-local'],[type='month'],[type='search'],[type='tel'],[type='time'],[type='week'],[multiple],textarea,select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #fff;
            border-color: #6B7280;
            border-width: 1px;
            border-radius: 0px;
            padding-top: 0.5rem;
            padding-right: 0.75rem;
            padding-bottom: 0.5rem;
            padding-left: 0.75rem;
            font-size: 1rem;
            line-height: 1.5rem;
            --tw-shadow: 0 0 #0000;
        }

        [type='text']:focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #1C64F2;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            border-color: #1C64F2;
        }

        input::-moz-placeholder, textarea::-moz-placeholder {
            color: #6B7280;
            opacity: 1;
        }

        input::placeholder,textarea::placeholder {
            color: #6B7280;
            opacity: 1;
        }

        ::-webkit-datetime-edit-fields-wrapper {
            padding: 0;
        }

        ::-webkit-date-and-time-value {
            min-height: 1.5em;
        }

        select:not([size]) {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 10 6'%3e %3cpath stroke='%236B7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 4 4 4-4'/%3e %3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 0.75em 0.75em;
            padding-right: 2.5rem;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        :is([dir=rtl]) select:not([size]) {
            background-position: left 0.75rem center;
            padding-right: 0.75rem;
            padding-left: 0;
        }

        [multiple] {
            background-image: initial;
            background-position: initial;
            background-repeat: unset;
            background-size: initial;
            padding-right: 0.75rem;
            -webkit-print-color-adjust: unset;
            print-color-adjust: unset;
        }

        [type='checkbox'],[type='radio'] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            flex-shrink: 0;
            height: 1rem;
            width: 1rem;
            color: #1C64F2;
            background-color: #fff;
            border-color: #6B7280;
            border-width: 1px;
            --tw-shadow: 0 0 #0000;
        }

        [type='checkbox'] {
            border-radius: 0px;
        }

        [type='radio'] {
            border-radius: 100%;
        }

        [type='checkbox']:focus,[type='radio']:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-inset: var(--tw-empty,/*!*/ /*!*/);
            --tw-ring-offset-width: 2px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #1C64F2;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
        }

        [type='checkbox']:checked,[type='radio']:checked,.dark [type='checkbox']:checked,.dark [type='radio']:checked {
            border-color: transparent;
            background-color: currentColor;
            background-size: 0.55em 0.55em;
            background-position: center;
            background-repeat: no-repeat;
        }

        [type='checkbox']:checked {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 12'%3e %3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M1 5.917 5.724 10.5 15 1.5'/%3e %3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 0.55em 0.55em;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        [type='radio']:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            background-size: 1em 1em;
        }

        .dark [type='radio']:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
            background-size: 1em 1em;
        }

        [type='checkbox']:indeterminate {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 12'%3e %3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M0.5 6h14'/%3e %3c/svg%3e");
            background-color: currentColor;
            border-color: transparent;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 0.55em 0.55em;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        [type='checkbox']:indeterminate:hover,[type='checkbox']:indeterminate:focus {
            border-color: transparent;
            background-color: currentColor;
        }

        [type='file'] {
            background: unset;
            border-color: inherit;
            border-width: 0;
            border-radius: 0;
            padding: 0;
            font-size: unset;
            line-height: inherit;
        }

        [type='file']:focus {
            outline: 1px auto inherit;
        }

        input[type=file]::file-selector-button {
            color: white;
            background: #1F2937;
            border: 0;
            font-weight: 500;
            font-size: 0.875rem;
            cursor: pointer;
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
            padding-left: 2rem;
            padding-right: 1rem;
            margin-inline-start: -1rem;
            margin-inline-end: 1rem;
        }

        input[type=file]::file-selector-button:hover {
            background: #374151;
        }

        :is([dir=rtl]) input[type=file]::file-selector-button {
            padding-right: 2rem;
            padding-left: 1rem;
        }

        .dark input[type=file]::file-selector-button {
            color: white;
            background: #4B5563;
        }

        .dark input[type=file]::file-selector-button:hover {
            background: #6B7280;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 1.25rem;
            width: 1.25rem;
            background: #1C64F2;
            border-radius: 9999px;
            border: 0;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        input[type="range"]:disabled::-webkit-slider-thumb {
            background: #9CA3AF;
        }

        .dark input[type="range"]:disabled::-webkit-slider-thumb {
            background: #6B7280;
        }

        input[type="range"]:focus::-webkit-slider-thumb {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            --tw-ring-opacity: 1px;
            --tw-ring-color: rgb(164 202 254 / var(--tw-ring-opacity));
        }

        input[type="range"]::-moz-range-thumb {
            height: 1.25rem;
            width: 1.25rem;
            background: #1C64F2;
            border-radius: 9999px;
            border: 0;
            appearance: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            cursor: pointer;
        }

        input[type="range"]:disabled::-moz-range-thumb {
            background: #9CA3AF;
        }

        .dark input[type="range"]:disabled::-moz-range-thumb {
            background: #6B7280;
        }

        input[type="range"]::-moz-range-progress {
            background: #3F83F8;
        }

        input[type="range"]::-ms-fill-lower {
            background: #3F83F8;
        }

        *, ::before, ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x:  ;
            --tw-pan-y:  ;
            --tw-pinch-zoom:  ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position:  ;
            --tw-gradient-via-position:  ;
            --tw-gradient-to-position:  ;
            --tw-ordinal:  ;
            --tw-slashed-zero:  ;
            --tw-numeric-figure:  ;
            --tw-numeric-spacing:  ;
            --tw-numeric-fraction:  ;
            --tw-ring-inset:  ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(63 131 248 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur:  ;
            --tw-brightness:  ;
            --tw-contrast:  ;
            --tw-grayscale:  ;
            --tw-hue-rotate:  ;
            --tw-invert:  ;
            --tw-saturate:  ;
            --tw-sepia:  ;
            --tw-drop-shadow:  ;
            --tw-backdrop-blur:  ;
            --tw-backdrop-brightness:  ;
            --tw-backdrop-contrast:  ;
            --tw-backdrop-grayscale:  ;
            --tw-backdrop-hue-rotate:  ;
            --tw-backdrop-invert:  ;
            --tw-backdrop-opacity:  ;
            --tw-backdrop-saturate:  ;
            --tw-backdrop-sepia:  ;
            --tw-contain-size:  ;
            --tw-contain-layout:  ;
            --tw-contain-paint:  ;
            --tw-contain-style:  ;
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x:  ;
            --tw-pan-y:  ;
            --tw-pinch-zoom:  ;
            --tw-scroll-snap-strictness: proximity;
            --tw-gradient-from-position:  ;
            --tw-gradient-via-position:  ;
            --tw-gradient-to-position:  ;
            --tw-ordinal:  ;
            --tw-slashed-zero:  ;
            --tw-numeric-figure:  ;
            --tw-numeric-spacing:  ;
            --tw-numeric-fraction:  ;
            --tw-ring-inset:  ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(63 131 248 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur:  ;
            --tw-brightness:  ;
            --tw-contrast:  ;
            --tw-grayscale:  ;
            --tw-hue-rotate:  ;
            --tw-invert:  ;
            --tw-saturate:  ;
            --tw-sepia:  ;
            --tw-drop-shadow:  ;
            --tw-backdrop-blur:  ;
            --tw-backdrop-brightness:  ;
            --tw-backdrop-contrast:  ;
            --tw-backdrop-grayscale:  ;
            --tw-backdrop-hue-rotate:  ;
            --tw-backdrop-invert:  ;
            --tw-backdrop-opacity:  ;
            --tw-backdrop-saturate:  ;
            --tw-backdrop-sepia:  ;
            --tw-contain-size:  ;
            --tw-contain-layout:  ;
            --tw-contain-paint:  ;
            --tw-contain-style:  ;
        }

        .container {
            width: 100%;
        }

        @media (min-width: 640px) {
            .container {
                max-width: 640px;
            }
        }

        @media (min-width: 768px) {
            .container {
                max-width: 768px;
            }
        }

        @media (min-width: 1024px) {
            .container {
                max-width: 1024px;
            }
        }

        @media (min-width: 1280px) {
            .container {
                max-width: 1280px;
            }
        }

        @media (min-width: 1536px) {
            .container {
                max-width: 1536px;
            }
        }

        .prose {
            color: var(--tw-prose-body);
            max-width: 65ch;
        }

        .prose :where(p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose :where([class~="lead"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-lead);
            font-size: 1.25em;
            line-height: 1.6;
            margin-top: 1.2em;
            margin-bottom: 1.2em;
        }

        .prose :where(a):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-links);
            text-decoration: underline;
            font-weight: 500;
        }

        .prose :where(strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-bold);
            font-weight: 600;
        }

        .prose :where(a strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(blockquote strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(thead th strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: decimal;
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            padding-inline-start: 1.625em;
        }

        .prose :where(ol[type="A"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: upper-alpha;
        }

        .prose :where(ol[type="a"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: lower-alpha;
        }

        .prose :where(ol[type="A" s]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: upper-alpha;
        }

        .prose :where(ol[type="a" s]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: lower-alpha;
        }

        .prose :where(ol[type="I"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: upper-roman;
        }

        .prose :where(ol[type="i"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: lower-roman;
        }

        .prose :where(ol[type="I" s]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: upper-roman;
        }

        .prose :where(ol[type="i" s]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: lower-roman;
        }

        .prose :where(ol[type="1"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: decimal;
        }

        .prose :where(ul):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            list-style-type: disc;
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            padding-inline-start: 1.625em;
        }

        .prose :where(ol > li):not(:where([class~="not-prose"],[class~="not-prose"] *))::marker {
            font-weight: 400;
            color: var(--tw-prose-counters);
        }

        .prose :where(ul > li):not(:where([class~="not-prose"],[class~="not-prose"] *))::marker {
            color: var(--tw-prose-bullets);
        }

        .prose :where(dt):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-headings);
            font-weight: 600;
            margin-top: 1.25em;
        }

        .prose :where(hr):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            border-color: var(--tw-prose-hr);
            border-top-width: 1px;
            margin-top: 3em;
            margin-bottom: 3em;
        }

        .prose :where(blockquote):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-weight: 500;
            font-style: italic;
            color: var(--tw-prose-quotes);
            border-inline-start-width: 0.25rem;
            border-inline-start-color: var(--tw-prose-quote-borders);
            quotes: "\201C""\201D""\2018""\2019";
            margin-top: 1.6em;
            margin-bottom: 1.6em;
            padding-inline-start: 1em;
        }

        .prose :where(blockquote p:first-of-type):not(:where([class~="not-prose"],[class~="not-prose"] *))::before {
            content: open-quote;
        }

        .prose :where(blockquote p:last-of-type):not(:where([class~="not-prose"],[class~="not-prose"] *))::after {
            content: close-quote;
        }

        .prose :where(h1):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-headings);
            font-weight: 800;
            font-size: 2.25em;
            margin-top: 0;
            margin-bottom: 0.8888889em;
            line-height: 1.1111111;
        }

        .prose :where(h1 strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-weight: 900;
            color: inherit;
        }

        .prose :where(h2):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-headings);
            font-weight: 700;
            font-size: 1.5em;
            margin-top: 2em;
            margin-bottom: 1em;
            line-height: 1.3333333;
        }

        .prose :where(h2 strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-weight: 800;
            color: inherit;
        }

        .prose :where(h3):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-headings);
            font-weight: 600;
            font-size: 1.25em;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            line-height: 1.6;
        }

        .prose :where(h3 strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-weight: 700;
            color: inherit;
        }

        .prose :where(h4):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-headings);
            font-weight: 600;
            margin-top: 1.5em;
            margin-bottom: 0.5em;
            line-height: 1.5;
        }

        .prose :where(h4 strong):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-weight: 700;
            color: inherit;
        }

        .prose :where(img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose :where(picture):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            display: block;
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose :where(video):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose :where(kbd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-weight: 500;
            font-family: inherit;
            color: var(--tw-prose-kbd);
            box-shadow: 0 0 0 1px rgb(var(--tw-prose-kbd-shadows) / 10%), 0 3px 0 rgb(var(--tw-prose-kbd-shadows) / 10%);
            font-size: 0.875em;
            border-radius: 0.3125rem;
            padding-top: 0.1875em;
            padding-inline-end: 0.375em;
            padding-bottom: 0.1875em;
            padding-inline-start: 0.375em;
        }

        .prose :where(code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-code);
            font-weight: 600;
            font-size: 0.875em;
        }

        .prose :where(code):not(:where([class~="not-prose"],[class~="not-prose"] *))::before {
            content: "`";
        }

        .prose :where(code):not(:where([class~="not-prose"],[class~="not-prose"] *))::after {
            content: "`";
        }

        .prose :where(a code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(h1 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(h2 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
            font-size: 0.875em;
        }

        .prose :where(h3 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
            font-size: 0.9em;
        }

        .prose :where(h4 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(blockquote code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(thead th code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: inherit;
        }

        .prose :where(pre):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-pre-code);
            background-color: var(--tw-prose-pre-bg);
            overflow-x: auto;
            font-weight: 400;
            font-size: 0.875em;
            line-height: 1.7142857;
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
            border-radius: 0.375rem;
            padding-top: 0.8571429em;
            padding-inline-end: 1.1428571em;
            padding-bottom: 0.8571429em;
            padding-inline-start: 1.1428571em;
        }

        .prose :where(pre code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            background-color: transparent;
            border-width: 0;
            border-radius: 0;
            padding: 0;
            font-weight: inherit;
            color: inherit;
            font-size: inherit;
            font-family: inherit;
            line-height: inherit;
        }

        .prose :where(pre code):not(:where([class~="not-prose"],[class~="not-prose"] *))::before {
            content: none;
        }

        .prose :where(pre code):not(:where([class~="not-prose"],[class~="not-prose"] *))::after {
            content: none;
        }

        .prose :where(table):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            width: 100%;
            table-layout: auto;
            text-align: start;
            margin-top: 2em;
            margin-bottom: 2em;
            font-size: 0.875em;
            line-height: 1.7142857;
        }

        .prose :where(thead):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            border-bottom-width: 1px;
            border-bottom-color: var(--tw-prose-th-borders);
        }

        .prose :where(thead th):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-headings);
            font-weight: 600;
            vertical-align: bottom;
            padding-inline-end: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-inline-start: 0.5714286em;
        }

        .prose :where(tbody tr):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            border-bottom-width: 1px;
            border-bottom-color: var(--tw-prose-td-borders);
        }

        .prose :where(tbody tr:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            border-bottom-width: 0;
        }

        .prose :where(tbody td):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            vertical-align: baseline;
        }

        .prose :where(tfoot):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            border-top-width: 1px;
            border-top-color: var(--tw-prose-th-borders);
        }

        .prose :where(tfoot td):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            vertical-align: top;
        }

        .prose :where(figure > *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose :where(figcaption):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            color: var(--tw-prose-captions);
            font-size: 0.875em;
            line-height: 1.4285714;
            margin-top: 0.8571429em;
        }

        .prose {
            --tw-prose-body: #374151;
            --tw-prose-headings: #111827;
            --tw-prose-lead: #4b5563;
            --tw-prose-links: #111827;
            --tw-prose-bold: #111827;
            --tw-prose-counters: #6b7280;
            --tw-prose-bullets: #d1d5db;
            --tw-prose-hr: #e5e7eb;
            --tw-prose-quotes: #111827;
            --tw-prose-quote-borders: #e5e7eb;
            --tw-prose-captions: #6b7280;
            --tw-prose-kbd: #111827;
            --tw-prose-kbd-shadows: 17 24 39;
            --tw-prose-code: #111827;
            --tw-prose-pre-code: #e5e7eb;
            --tw-prose-pre-bg: #1f2937;
            --tw-prose-th-borders: #d1d5db;
            --tw-prose-td-borders: #e5e7eb;
            --tw-prose-invert-body: #d1d5db;
            --tw-prose-invert-headings: #fff;
            --tw-prose-invert-lead: #9ca3af;
            --tw-prose-invert-links: #fff;
            --tw-prose-invert-bold: #fff;
            --tw-prose-invert-counters: #9ca3af;
            --tw-prose-invert-bullets: #4b5563;
            --tw-prose-invert-hr: #374151;
            --tw-prose-invert-quotes: #f3f4f6;
            --tw-prose-invert-quote-borders: #374151;
            --tw-prose-invert-captions: #9ca3af;
            --tw-prose-invert-kbd: #fff;
            --tw-prose-invert-kbd-shadows: 255 255 255;
            --tw-prose-invert-code: #fff;
            --tw-prose-invert-pre-code: #d1d5db;
            --tw-prose-invert-pre-bg: rgb(0 0 0 / 50%);
            --tw-prose-invert-th-borders: #4b5563;
            --tw-prose-invert-td-borders: #374151;
            font-size: 1rem;
            line-height: 1.75;
        }

        .prose :where(picture > img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose :where(li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .prose :where(ol > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.375em;
        }

        .prose :where(ul > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.375em;
        }

        .prose :where(.prose > ul > li p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        .prose :where(.prose > ul > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
        }

        .prose :where(.prose > ul > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.25em;
        }

        .prose :where(.prose > ol > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
        }

        .prose :where(.prose > ol > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.25em;
        }

        .prose :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        .prose :where(dl):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose :where(dd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.5em;
            padding-inline-start: 1.625em;
        }

        .prose :where(hr + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose :where(h2 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose :where(h3 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose :where(h4 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose :where(thead th:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose :where(thead th:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose :where(tbody td, tfoot td):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-top: 0.5714286em;
            padding-inline-end: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-inline-start: 0.5714286em;
        }

        .prose :where(tbody td:first-child, tfoot td:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose :where(tbody td:last-child, tfoot td:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose :where(figure):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose :where(.prose > :first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose :where(.prose > :last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 0;
        }

        .prose-sm {
            font-size: 0.875rem;
            line-height: 1.7142857;
        }

        .prose-sm :where(p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
        }

        .prose-sm :where([class~="lead"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.2857143em;
            line-height: 1.5555556;
            margin-top: 0.8888889em;
            margin-bottom: 0.8888889em;
        }

        .prose-sm :where(blockquote):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
            margin-bottom: 1.3333333em;
            padding-inline-start: 1.1111111em;
        }

        .prose-sm :where(h1):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 2.1428571em;
            margin-top: 0;
            margin-bottom: 0.8em;
            line-height: 1.2;
        }

        .prose-sm :where(h2):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.4285714em;
            margin-top: 1.6em;
            margin-bottom: 0.8em;
            line-height: 1.4;
        }

        .prose-sm :where(h3):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.2857143em;
            margin-top: 1.5555556em;
            margin-bottom: 0.4444444em;
            line-height: 1.5555556;
        }

        .prose-sm :where(h4):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.4285714em;
            margin-bottom: 0.5714286em;
            line-height: 1.4285714;
        }

        .prose-sm :where(img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm :where(picture):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm :where(picture > img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-sm :where(video):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm :where(kbd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8571429em;
            border-radius: 0.3125rem;
            padding-top: 0.1428571em;
            padding-inline-end: 0.3571429em;
            padding-bottom: 0.1428571em;
            padding-inline-start: 0.3571429em;
        }

        .prose-sm :where(code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8571429em;
        }

        .prose-sm :where(h2 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.9em;
        }

        .prose-sm :where(h3 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8888889em;
        }

        .prose-sm :where(pre):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8571429em;
            line-height: 1.6666667;
            margin-top: 1.6666667em;
            margin-bottom: 1.6666667em;
            border-radius: 0.25rem;
            padding-top: 0.6666667em;
            padding-inline-end: 1em;
            padding-bottom: 0.6666667em;
            padding-inline-start: 1em;
        }

        .prose-sm :where(ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
            padding-inline-start: 1.5714286em;
        }

        .prose-sm :where(ul):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
            padding-inline-start: 1.5714286em;
        }

        .prose-sm :where(li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.2857143em;
            margin-bottom: 0.2857143em;
        }

        .prose-sm :where(ol > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.4285714em;
        }

        .prose-sm :where(ul > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.4285714em;
        }

        .prose-sm :where(.prose-sm > ul > li p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.5714286em;
            margin-bottom: 0.5714286em;
        }

        .prose-sm :where(.prose-sm > ul > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
        }

        .prose-sm :where(.prose-sm > ul > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.1428571em;
        }

        .prose-sm :where(.prose-sm > ol > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
        }

        .prose-sm :where(.prose-sm > ol > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.1428571em;
        }

        .prose-sm :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.5714286em;
            margin-bottom: 0.5714286em;
        }

        .prose-sm :where(dl):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
            margin-bottom: 1.1428571em;
        }

        .prose-sm :where(dt):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.1428571em;
        }

        .prose-sm :where(dd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.2857143em;
            padding-inline-start: 1.5714286em;
        }

        .prose-sm :where(hr):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2.8571429em;
            margin-bottom: 2.8571429em;
        }

        .prose-sm :where(hr + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-sm :where(h2 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-sm :where(h3 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-sm :where(h4 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-sm :where(table):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8571429em;
            line-height: 1.5;
        }

        .prose-sm :where(thead th):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 1em;
            padding-bottom: 0.6666667em;
            padding-inline-start: 1em;
        }

        .prose-sm :where(thead th:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose-sm :where(thead th:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose-sm :where(tbody td, tfoot td):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-top: 0.6666667em;
            padding-inline-end: 1em;
            padding-bottom: 0.6666667em;
            padding-inline-start: 1em;
        }

        .prose-sm :where(tbody td:first-child, tfoot td:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose-sm :where(tbody td:last-child, tfoot td:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose-sm :where(figure):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
        }

        .prose-sm :where(figure > *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-sm :where(figcaption):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8571429em;
            line-height: 1.3333333;
            margin-top: 0.6666667em;
        }

        .prose-sm :where(.prose-sm > :first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-sm :where(.prose-sm > :last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 0;
        }

        .prose-base {
            font-size: 1rem;
            line-height: 1.75;
        }

        .prose-base :where(p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose-base :where([class~="lead"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.25em;
            line-height: 1.6;
            margin-top: 1.2em;
            margin-bottom: 1.2em;
        }

        .prose-base :where(blockquote):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.6em;
            margin-bottom: 1.6em;
            padding-inline-start: 1em;
        }

        .prose-base :where(h1):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 2.25em;
            margin-top: 0;
            margin-bottom: 0.8888889em;
            line-height: 1.1111111;
        }

        .prose-base :where(h2):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.5em;
            margin-top: 2em;
            margin-bottom: 1em;
            line-height: 1.3333333;
        }

        .prose-base :where(h3):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.25em;
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            line-height: 1.6;
        }

        .prose-base :where(h4):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.5em;
            margin-bottom: 0.5em;
            line-height: 1.5;
        }

        .prose-base :where(img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose-base :where(picture):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose-base :where(picture > img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-base :where(video):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose-base :where(kbd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
            border-radius: 0.3125rem;
            padding-top: 0.1875em;
            padding-inline-end: 0.375em;
            padding-bottom: 0.1875em;
            padding-inline-start: 0.375em;
        }

        .prose-base :where(code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
        }

        .prose-base :where(h2 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
        }

        .prose-base :where(h3 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.9em;
        }

        .prose-base :where(pre):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
            line-height: 1.7142857;
            margin-top: 1.7142857em;
            margin-bottom: 1.7142857em;
            border-radius: 0.375rem;
            padding-top: 0.8571429em;
            padding-inline-end: 1.1428571em;
            padding-bottom: 0.8571429em;
            padding-inline-start: 1.1428571em;
        }

        .prose-base :where(ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            padding-inline-start: 1.625em;
        }

        .prose-base :where(ul):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
            padding-inline-start: 1.625em;
        }

        .prose-base :where(li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }

        .prose-base :where(ol > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.375em;
        }

        .prose-base :where(ul > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.375em;
        }

        .prose-base :where(.prose-base > ul > li p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        .prose-base :where(.prose-base > ul > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
        }

        .prose-base :where(.prose-base > ul > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.25em;
        }

        .prose-base :where(.prose-base > ol > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
        }

        .prose-base :where(.prose-base > ol > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.25em;
        }

        .prose-base :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        .prose-base :where(dl):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose-base :where(dt):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.25em;
        }

        .prose-base :where(dd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.5em;
            padding-inline-start: 1.625em;
        }

        .prose-base :where(hr):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 3em;
            margin-bottom: 3em;
        }

        .prose-base :where(hr + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-base :where(h2 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-base :where(h3 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-base :where(h4 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-base :where(table):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
            line-height: 1.7142857;
        }

        .prose-base :where(thead th):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-inline-start: 0.5714286em;
        }

        .prose-base :where(thead th:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose-base :where(thead th:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose-base :where(tbody td, tfoot td):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-top: 0.5714286em;
            padding-inline-end: 0.5714286em;
            padding-bottom: 0.5714286em;
            padding-inline-start: 0.5714286em;
        }

        .prose-base :where(tbody td:first-child, tfoot td:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose-base :where(tbody td:last-child, tfoot td:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose-base :where(figure):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .prose-base :where(figure > *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-base :where(figcaption):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
            line-height: 1.4285714;
            margin-top: 0.8571429em;
        }

        .prose-base :where(.prose-base > :first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-base :where(.prose-base > :last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 0;
        }

        .prose-lg {
            font-size: 1.125rem;
            line-height: 1.7777778;
        }

        .prose-lg :where(p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
            margin-bottom: 1.3333333em;
        }

        .prose-lg :where([class~="lead"]):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.2222222em;
            line-height: 1.4545455;
            margin-top: 1.0909091em;
            margin-bottom: 1.0909091em;
        }

        .prose-lg :where(blockquote):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.6666667em;
            margin-bottom: 1.6666667em;
            padding-inline-start: 1em;
        }

        .prose-lg :where(h1):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 2.6666667em;
            margin-top: 0;
            margin-bottom: 0.8333333em;
            line-height: 1;
        }

        .prose-lg :where(h2):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.6666667em;
            margin-top: 1.8666667em;
            margin-bottom: 1.0666667em;
            line-height: 1.3333333;
        }

        .prose-lg :where(h3):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 1.3333333em;
            margin-top: 1.6666667em;
            margin-bottom: 0.6666667em;
            line-height: 1.5;
        }

        .prose-lg :where(h4):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7777778em;
            margin-bottom: 0.4444444em;
            line-height: 1.5555556;
        }

        .prose-lg :where(img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7777778em;
            margin-bottom: 1.7777778em;
        }

        .prose-lg :where(picture):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7777778em;
            margin-bottom: 1.7777778em;
        }

        .prose-lg :where(picture > img):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-lg :where(video):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7777778em;
            margin-bottom: 1.7777778em;
        }

        .prose-lg :where(kbd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8888889em;
            border-radius: 0.3125rem;
            padding-top: 0.2222222em;
            padding-inline-end: 0.4444444em;
            padding-bottom: 0.2222222em;
            padding-inline-start: 0.4444444em;
        }

        .prose-lg :where(code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8888889em;
        }

        .prose-lg :where(h2 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8666667em;
        }

        .prose-lg :where(h3 code):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.875em;
        }

        .prose-lg :where(pre):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8888889em;
            line-height: 1.75;
            margin-top: 2em;
            margin-bottom: 2em;
            border-radius: 0.375rem;
            padding-top: 1em;
            padding-inline-end: 1.5em;
            padding-bottom: 1em;
            padding-inline-start: 1.5em;
        }

        .prose-lg :where(ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
            margin-bottom: 1.3333333em;
            padding-inline-start: 1.5555556em;
        }

        .prose-lg :where(ul):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
            margin-bottom: 1.3333333em;
            padding-inline-start: 1.5555556em;
        }

        .prose-lg :where(li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.6666667em;
            margin-bottom: 0.6666667em;
        }

        .prose-lg :where(ol > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.4444444em;
        }

        .prose-lg :where(ul > li):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0.4444444em;
        }

        .prose-lg :where(.prose-lg > ul > li p):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.8888889em;
            margin-bottom: 0.8888889em;
        }

        .prose-lg :where(.prose-lg > ul > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
        }

        .prose-lg :where(.prose-lg > ul > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.3333333em;
        }

        .prose-lg :where(.prose-lg > ol > li > *:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
        }

        .prose-lg :where(.prose-lg > ol > li > *:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 1.3333333em;
        }

        .prose-lg :where(ul ul, ul ol, ol ul, ol ol):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.8888889em;
            margin-bottom: 0.8888889em;
        }

        .prose-lg :where(dl):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
            margin-bottom: 1.3333333em;
        }

        .prose-lg :where(dt):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.3333333em;
        }

        .prose-lg :where(dd):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0.6666667em;
            padding-inline-start: 1.5555556em;
        }

        .prose-lg :where(hr):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 3.1111111em;
            margin-bottom: 3.1111111em;
        }

        .prose-lg :where(hr + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-lg :where(h2 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-lg :where(h3 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-lg :where(h4 + *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-lg :where(table):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8888889em;
            line-height: 1.5;
        }

        .prose-lg :where(thead th):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0.75em;
            padding-bottom: 0.75em;
            padding-inline-start: 0.75em;
        }

        .prose-lg :where(thead th:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose-lg :where(thead th:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose-lg :where(tbody td, tfoot td):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-top: 0.75em;
            padding-inline-end: 0.75em;
            padding-bottom: 0.75em;
            padding-inline-start: 0.75em;
        }

        .prose-lg :where(tbody td:first-child, tfoot td:first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-start: 0;
        }

        .prose-lg :where(tbody td:last-child, tfoot td:last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            padding-inline-end: 0;
        }

        .prose-lg :where(figure):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 1.7777778em;
            margin-bottom: 1.7777778em;
        }

        .prose-lg :where(figure > *):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
            margin-bottom: 0;
        }

        .prose-lg :where(figcaption):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            font-size: 0.8888889em;
            line-height: 1.5;
            margin-top: 1em;
        }

        .prose-lg :where(.prose-lg > :first-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-top: 0;
        }

        .prose-lg :where(.prose-lg > :last-child):not(:where([class~="not-prose"],[class~="not-prose"] *)) {
            margin-bottom: 0;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }

        .pointer-events-none {
            pointer-events: none;
        }

        .pointer-events-auto {
            pointer-events: auto;
        }

        .visible {
            visibility: visible;
        }

        .invisible {
            visibility: hidden;
        }

        .collapse {
            visibility: collapse;
        }

        .static {
            position: static;
        }

        .fixed {
            position: fixed;
        }

        .absolute {
            position: absolute;
        }

        .relative {
            position: relative;
        }

        .sticky {
            position: sticky;
        }

        .-inset-1 {
            inset: -0.25rem;
        }

        .inset-0 {
            inset: 0px;
        }

        .inset-4 {
            inset: 1rem;
        }

        .inset-x-0 {
            left: 0px;
            right: 0px;
        }

        .inset-x-4 {
            left: 1rem;
            right: 1rem;
        }

        .inset-y-0 {
            top: 0px;
            bottom: 0px;
        }

        .-bottom-1\/2 {
            bottom: -50%;
        }

        .-left-1 {
            left: -0.25rem;
        }

        .-top-1 {
            top: -0.25rem;
        }

        .-top-1\/2 {
            top: -50%;
        }

        .-top-2 {
            top: -0.5rem;
        }

        .-top-3 {
            top: -0.75rem;
        }

        .bottom-0 {
            bottom: 0px;
        }

        .bottom-1\/2 {
            bottom: 50%;
        }

        .bottom-4 {
            bottom: 1rem;
        }

        .end-0 {
            inset-inline-end: 0px;
        }

        .end-4 {
            inset-inline-end: 1rem;
        }

        .end-6 {
            inset-inline-end: 1.5rem;
        }

        .left-3 {
            left: 0.75rem;
        }

        .right-0 {
            right: 0px;
        }

        .right-4 {
            right: 1rem;
        }

        .start-0 {
            inset-inline-start: 0px;
        }

        .start-full {
            inset-inline-start: 100%;
        }

        .top-0 {
            top: 0px;
        }

        .top-1\/2 {
            top: 50%;
        }

        .top-4 {
            top: 1rem;
        }

        .top-6 {
            top: 1.5rem;
        }

        .isolate {
            isolation: isolate;
        }

        .z-0 {
            z-index: 0;
        }

        .z-10 {
            z-index: 10;
        }

        .z-20 {
            z-index: 20;
        }

        .z-30 {
            z-index: 30;
        }

        .z-40 {
            z-index: 40;
        }

        .z-50 {
            z-index: 50;
        }

        .z-\[1\] {
            z-index: 1;
        }

        .col-\[--col-span-default\] {
            grid-column: var(--col-span-default);
        }

        .col-span-6 {
            grid-column: span 6 / span 6;
        }

        .col-span-full {
            grid-column: 1 / -1;
        }

        .col-start-2 {
            grid-column-start: 2;
        }

        .col-start-3 {
            grid-column-start: 3;
        }

        .col-start-\[--col-start-default\] {
            grid-column-start: var(--col-start-default);
        }

        .row-start-2 {
            grid-row-start: 2;
        }

        .-m-0 {
            margin: -0px;
        }

        .-m-0\.5 {
            margin: -0.125rem;
        }

        .-m-1 {
            margin: -0.25rem;
        }

        .-m-1\.5 {
            margin: -0.375rem;
        }

        .-m-2 {
            margin: -0.5rem;
        }

        .-m-2\.5 {
            margin: -0.625rem;
        }

        .-m-3 {
            margin: -0.75rem;
        }

        .-m-3\.5 {
            margin: -0.875rem;
        }

        .m-10 {
            margin: 2.5rem;
        }

        .m-4 {
            margin: 1rem;
        }

        .-mx-1 {
            margin-left: -0.25rem;
            margin-right: -0.25rem;
        }

        .-mx-1\.5 {
            margin-left: -0.375rem;
            margin-right: -0.375rem;
        }

        .-mx-2 {
            margin-left: -0.5rem;
            margin-right: -0.5rem;
        }

        .-mx-4 {
            margin-left: -1rem;
            margin-right: -1rem;
        }

        .-mx-6 {
            margin-left: -1.5rem;
            margin-right: -1.5rem;
        }

        .-my-1 {
            margin-top: -0.25rem;
            margin-bottom: -0.25rem;
        }

        .-my-1\.5 {
            margin-top: -0.375rem;
            margin-bottom: -0.375rem;
        }

        .mx-1 {
            margin-left: 0.25rem;
            margin-right: 0.25rem;
        }

        .mx-3 {
            margin-left: 0.75rem;
            margin-right: 0.75rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .my-16 {
            margin-top: 4rem;
            margin-bottom: 4rem;
        }

        .my-2 {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .my-4 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .my-6 {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .my-auto {
            margin-top: auto;
            margin-bottom: auto;
        }

        .\!mt-0 {
            margin-top: 0px !important;
        }

        .-mb-4 {
            margin-bottom: -1rem;
        }

        .-mb-6 {
            margin-bottom: -1.5rem;
        }

        .-me-1 {
            margin-inline-end: -0.25rem;
        }

        .-me-2 {
            margin-inline-end: -0.5rem;
        }

        .-ml-px {
            margin-left: -1px;
        }

        .-ms-0 {
            margin-inline-start: -0px;
        }

        .-ms-0\.5 {
            margin-inline-start: -0.125rem;
        }

        .-ms-1 {
            margin-inline-start: -0.25rem;
        }

        .-ms-2 {
            margin-inline-start: -0.5rem;
        }

        .-mt-3 {
            margin-top: -0.75rem;
        }

        .-mt-4 {
            margin-top: -1rem;
        }

        .-mt-6 {
            margin-top: -1.5rem;
        }

        .-mt-7 {
            margin-top: -1.75rem;
        }

        .-mt-px {
            margin-top: -1px;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .me-1 {
            margin-inline-end: 0.25rem;
        }

        .me-2 {
            margin-inline-end: 0.5rem;
        }

        .me-3 {
            margin-inline-end: 0.75rem;
        }

        .me-4 {
            margin-inline-end: 1rem;
        }

        .me-6 {
            margin-inline-end: 1.5rem;
        }

        .ml-1 {
            margin-left: 0.25rem;
        }

        .ml-12 {
            margin-left: 3rem;
        }

        .ml-2 {
            margin-left: 0.5rem;
        }

        .ml-3 {
            margin-left: 0.75rem;
        }

        .ml-4 {
            margin-left: 1rem;
        }

        .ml-auto {
            margin-left: auto;
        }

        .mr-1 {
            margin-right: 0.25rem;
        }

        .mr-2 {
            margin-right: 0.5rem;
        }

        .ms-1 {
            margin-inline-start: 0.25rem;
        }

        .ms-2 {
            margin-inline-start: 0.5rem;
        }

        .ms-3 {
            margin-inline-start: 0.75rem;
        }

        .ms-4 {
            margin-inline-start: 1rem;
        }

        .ms-6 {
            margin-inline-start: 1.5rem;
        }

        .ms-auto {
            margin-inline-start: auto;
        }

        .mt-0 {
            margin-top: 0px;
        }

        .mt-0\.5 {
            margin-top: 0.125rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .mt-10 {
            margin-top: 2.5rem;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-3 {
            margin-top: 0.75rem;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .mt-5 {
            margin-top: 1.25rem;
        }

        .mt-6 {
            margin-top: 1.5rem;
        }

        .mt-8 {
            margin-top: 2rem;
        }

        .mt-auto {
            margin-top: auto;
        }

        .line-clamp-\[--line-clamp\] {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: var(--line-clamp);
        }

        .block {
            display: block;
        }

        .inline-block {
            display: inline-block;
        }

        .inline {
            display: inline;
        }

        .flex {
            display: flex;
        }

        .inline-flex {
            display: inline-flex;
        }

        .table {
            display: table;
        }

        .grid {
            display: grid;
        }

        .inline-grid {
            display: inline-grid;
        }

        .hidden {
            display: none;
        }

        .h-0 {
            height: 0px;
        }

        .h-1 {
            height: 0.25rem;
        }

        .h-1\.5 {
            height: 0.375rem;
        }

        .h-10 {
            height: 2.5rem;
        }

        .h-11 {
            height: 2.75rem;
        }

        .h-12 {
            height: 3rem;
        }

        .h-16 {
            height: 4rem;
        }

        .h-3 {
            height: 0.75rem;
        }

        .h-3\.5 {
            height: 0.875rem;
        }

        .h-32 {
            height: 8rem;
        }

        .h-4 {
            height: 1rem;
        }

        .h-5 {
            height: 1.25rem;
        }

        .h-6 {
            height: 1.5rem;
        }

        .h-7 {
            height: 1.75rem;
        }

        .h-8 {
            height: 2rem;
        }

        .h-9 {
            height: 2.25rem;
        }

        .h-96 {
            height: 24rem;
        }

        .h-\[100dvh\] {
            height: 100dvh;
        }

        .h-dvh {
            height: 100dvh;
        }

        .h-full {
            height: 100%;
        }

        .h-screen {
            height: 100vh;
        }

        .max-h-96 {
            max-height: 24rem;
        }

        .min-h-\[theme\(spacing\.48\)\] {
            min-height: 12rem;
        }

        .min-h-full {
            min-height: 100%;
        }

        .min-h-screen {
            min-height: 100vh;
        }

        .w-0 {
            width: 0px;
        }

        .w-1 {
            width: 0.25rem;
        }

        .w-1\.5 {
            width: 0.375rem;
        }

        .w-1\/2 {
            width: 50%;
        }

        .w-10 {
            width: 2.5rem;
        }

        .w-11 {
            width: 2.75rem;
        }

        .w-12 {
            width: 3rem;
        }

        .w-16 {
            width: 4rem;
        }

        .w-20 {
            width: 5rem;
        }

        .w-28 {
            width: 7rem;
        }

        .w-3 {
            width: 0.75rem;
        }

        .w-3\.5 {
            width: 0.875rem;
        }

        .w-3\/4 {
            width: 75%;
        }

        .w-32 {
            width: 8rem;
        }

        .w-4 {
            width: 1rem;
        }

        .w-48 {
            width: 12rem;
        }

        .w-5 {
            width: 1.25rem;
        }

        .w-6 {
            width: 1.5rem;
        }

        .w-64 {
            width: 16rem;
        }

        .w-7 {
            width: 1.75rem;
        }

        .w-72 {
            width: 18rem;
        }

        .w-8 {
            width: 2rem;
        }

        .w-9 {
            width: 2.25rem;
        }

        .w-\[--sidebar-width\] {
            width: var(--sidebar-width);
        }

        .w-\[108px\] {
            width: 108px;
        }

        .w-\[calc\(100\%\+2rem\)\] {
            width: calc(100% + 2rem);
        }

        .w-auto {
            width: auto;
        }

        .w-fit {
            width: -moz-fit-content;
            width: fit-content;
        }

        .w-full {
            width: 100%;
        }

        .w-max {
            width: -moz-max-content;
            width: max-content;
        }

        .w-px {
            width: 1px;
        }

        .w-screen {
            width: 100vw;
        }

        .min-w-0 {
            min-width: 0px;
        }

        .min-w-\[theme\(spacing\.4\)\] {
            min-width: 1rem;
        }

        .min-w-\[theme\(spacing\.5\)\] {
            min-width: 1.25rem;
        }

        .min-w-\[theme\(spacing\.6\)\] {
            min-width: 1.5rem;
        }

        .min-w-\[theme\(spacing\.8\)\] {
            min-width: 2rem;
        }

        .min-w-full {
            min-width: 100%;
        }

        .min-w-max {
            min-width: -moz-max-content;
            min-width: max-content;
        }

        .\!max-w-2xl {
            max-width: 42rem !important;
        }

        .\!max-w-3xl {
            max-width: 48rem !important;
        }

        .\!max-w-4xl {
            max-width: 56rem !important;
        }

        .\!max-w-5xl {
            max-width: 64rem !important;
        }

        .\!max-w-6xl {
            max-width: 72rem !important;
        }

        .\!max-w-7xl {
            max-width: 80rem !important;
        }

        .\!max-w-\[14rem\] {
            max-width: 14rem !important;
        }

        .\!max-w-lg {
            max-width: 32rem !important;
        }

        .\!max-w-md {
            max-width: 28rem !important;
        }

        .\!max-w-sm {
            max-width: 24rem !important;
        }

        .\!max-w-xl {
            max-width: 36rem !important;
        }

        .\!max-w-xs {
            max-width: 20rem !important;
        }

        .max-w-2xl {
            max-width: 42rem;
        }

        .max-w-3xl {
            max-width: 48rem;
        }

        .max-w-4xl {
            max-width: 56rem;
        }

        .max-w-5xl {
            max-width: 64rem;
        }

        .max-w-6xl {
            max-width: 72rem;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .max-w-fit {
            max-width: -moz-fit-content;
            max-width: fit-content;
        }

        .max-w-full {
            max-width: 100%;
        }

        .max-w-lg {
            max-width: 32rem;
        }

        .max-w-max {
            max-width: -moz-max-content;
            max-width: max-content;
        }

        .max-w-md {
            max-width: 28rem;
        }

        .max-w-min {
            max-width: -moz-min-content;
            max-width: min-content;
        }

        .max-w-none {
            max-width: none;
        }

        .max-w-prose {
            max-width: 65ch;
        }

        .max-w-screen-2xl {
            max-width: 1536px;
        }

        .max-w-screen-lg {
            max-width: 1024px;
        }

        .max-w-screen-md {
            max-width: 768px;
        }

        .max-w-screen-sm {
            max-width: 640px;
        }

        .max-w-screen-xl {
            max-width: 1280px;
        }

        .max-w-sm {
            max-width: 24rem;
        }

        .max-w-xl {
            max-width: 36rem;
        }

        .max-w-xs {
            max-width: 20rem;
        }

        .flex-1 {
            flex: 1 1 0%;
        }

        .flex-auto {
            flex: 1 1 auto;
        }

        .flex-shrink-0 {
            flex-shrink: 0;
        }

        .shrink-0 {
            flex-shrink: 0;
        }

        .flex-grow {
            flex-grow: 1;
        }

        .grow {
            flex-grow: 1;
        }

        .table-auto {
            table-layout: auto;
        }

        .origin-top {
            transform-origin: top;
        }

        .-translate-x-1\/2 {
            --tw-translate-x: -50%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-x-12 {
            --tw-translate-x: -3rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-x-5 {
            --tw-translate-x: -1.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-x-full {
            --tw-translate-x: -100%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-translate-y-12 {
            --tw-translate-y: -3rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-x-0 {
            --tw-translate-x: 0px;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-x-12 {
            --tw-translate-x: 3rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-x-5 {
            --tw-translate-x: 1.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-x-full {
            --tw-translate-x: 100%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-y-0 {
            --tw-translate-y: 0px;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-y-12 {
            --tw-translate-y: 3rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .translate-y-4 {
            --tw-translate-y: 1rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .-rotate-180 {
            --tw-rotate: -180deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rotate-180 {
            --tw-rotate: 180deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .scale-95 {
            --tw-scale-x: .95;
            --tw-scale-y: .95;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .transform {
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }

        .cursor-default {
            cursor: default;
        }

        .cursor-move {
            cursor: move;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .cursor-wait {
            cursor: wait;
        }

        .select-none {
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .resize-none {
            resize: none;
        }

        .scroll-mt-9 {
            scroll-margin-top: 2.25rem;
        }

        .list-inside {
            list-style-position: inside;
        }

        .list-disc {
            list-style-type: disc;
        }

        .columns-\[--cols-default\] {
            -moz-columns: var(--cols-default);
            columns: var(--cols-default);
        }

        .break-inside-avoid {
            -moz-column-break-inside: avoid;
            break-inside: avoid;
        }

        .auto-cols-fr {
            grid-auto-columns: minmax(0, 1fr);
        }

        .grid-flow-col {
            grid-auto-flow: column;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .grid-cols-6 {
            grid-template-columns: repeat(6, minmax(0, 1fr));
        }

        .grid-cols-7 {
            grid-template-columns: repeat(7, minmax(0, 1fr));
        }

        .grid-cols-\[--cols-default\] {
            grid-template-columns: var(--cols-default);
        }

        .grid-cols-\[1fr_auto_1fr\] {
            grid-template-columns: 1fr auto 1fr;
        }

        .grid-cols-\[repeat\(7\2c minmax\(theme\(spacing\.7\)\2c 1fr\)\)\] {
            grid-template-columns: repeat(7,minmax(1.75rem,1fr));
        }

        .grid-cols-\[repeat\(auto-fit\2c minmax\(0\2c 1fr\)\)\] {
            grid-template-columns: repeat(auto-fit,minmax(0,1fr));
        }

        .grid-rows-\[1fr_auto_1fr\] {
            grid-template-rows: 1fr auto 1fr;
        }

        .flex-row {
            flex-direction: row;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex-col-reverse {
            flex-direction: column-reverse;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .content-start {
            align-content: flex-start;
        }

        .items-start {
            align-items: flex-start;
        }

        .items-end {
            align-items: flex-end;
        }

        .items-center {
            align-items: center;
        }

        .items-stretch {
            align-items: stretch;
        }

        .justify-start {
            justify-content: flex-start;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-items-start {
            justify-items: start;
        }

        .justify-items-center {
            justify-items: center;
        }

        .gap-1 {
            gap: 0.25rem;
        }

        .gap-1\.5 {
            gap: 0.375rem;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .gap-8 {
            gap: 2rem;
        }

        .gap-x-1 {
            -moz-column-gap: 0.25rem;
            column-gap: 0.25rem;
        }

        .gap-x-1\.5 {
            -moz-column-gap: 0.375rem;
            column-gap: 0.375rem;
        }

        .gap-x-2 {
            -moz-column-gap: 0.5rem;
            column-gap: 0.5rem;
        }

        .gap-x-2\.5 {
            -moz-column-gap: 0.625rem;
            column-gap: 0.625rem;
        }

        .gap-x-3 {
            -moz-column-gap: 0.75rem;
            column-gap: 0.75rem;
        }

        .gap-x-4 {
            -moz-column-gap: 1rem;
            column-gap: 1rem;
        }

        .gap-x-5 {
            -moz-column-gap: 1.25rem;
            column-gap: 1.25rem;
        }

        .gap-x-6 {
            -moz-column-gap: 1.5rem;
            column-gap: 1.5rem;
        }

        .gap-y-1 {
            row-gap: 0.25rem;
        }

        .gap-y-1\.5 {
            row-gap: 0.375rem;
        }

        .gap-y-2 {
            row-gap: 0.5rem;
        }

        .gap-y-3 {
            row-gap: 0.75rem;
        }

        .gap-y-4 {
            row-gap: 1rem;
        }

        .gap-y-6 {
            row-gap: 1.5rem;
        }

        .gap-y-7 {
            row-gap: 1.75rem;
        }

        .gap-y-8 {
            row-gap: 2rem;
        }

        .gap-y-px {
            row-gap: 1px;
        }

        .-space-x-1 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-0.25rem * var(--tw-space-x-reverse));
            margin-left: calc(-0.25rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-2 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-0.5rem * var(--tw-space-x-reverse));
            margin-left: calc(-0.5rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-3 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-0.75rem * var(--tw-space-x-reverse));
            margin-left: calc(-0.75rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-4 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-1rem * var(--tw-space-x-reverse));
            margin-left: calc(-1rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-5 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-1.25rem * var(--tw-space-x-reverse));
            margin-left: calc(-1.25rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-6 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-1.5rem * var(--tw-space-x-reverse));
            margin-left: calc(-1.5rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-7 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-1.75rem * var(--tw-space-x-reverse));
            margin-left: calc(-1.75rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .-space-x-8 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(-2rem * var(--tw-space-x-reverse));
            margin-left: calc(-2rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-x-2 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(0.5rem * var(--tw-space-x-reverse));
            margin-left: calc(0.5rem * calc(1 - var(--tw-space-x-reverse)));
        }

        .space-y-1 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
        }

        .space-y-2 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
        }

        .space-y-3 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
        }

        .space-y-4 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1rem * var(--tw-space-y-reverse));
        }

        .space-y-6 > :not([hidden]) ~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
        }

        .divide-x > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-x-reverse: 0;
            border-right-width: calc(1px * var(--tw-divide-x-reverse));
            border-left-width: calc(1px * calc(1 - var(--tw-divide-x-reverse)));
        }

        .divide-y > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-y-reverse: 0;
            border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
            border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
        }

        .divide-y-2 > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-y-reverse: 0;
            border-top-width: calc(2px * calc(1 - var(--tw-divide-y-reverse)));
            border-bottom-width: calc(2px * var(--tw-divide-y-reverse));
        }

        .divide-gray-100 > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-opacity: 1;
            border-color: rgb(243 244 246 / var(--tw-divide-opacity));
        }

        .divide-gray-200 > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-divide-opacity));
        }

        .divide-slate-300 > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-opacity: 1;
            border-color: rgb(203 213 225 / var(--tw-divide-opacity));
        }

        .self-start {
            align-self: flex-start;
        }

        .self-stretch {
            align-self: stretch;
        }

        .justify-self-start {
            justify-self: start;
        }

        .justify-self-end {
            justify-self: end;
        }

        .justify-self-center {
            justify-self: center;
        }

        .overflow-auto {
            overflow: auto;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .overflow-x-auto {
            overflow-x: auto;
        }

        .overflow-y-auto {
            overflow-y: auto;
        }

        .overflow-x-hidden {
            overflow-x: hidden;
        }

        .overflow-y-hidden {
            overflow-y: hidden;
        }

        .overflow-x-clip {
            overflow-x: clip;
        }

        .truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .whitespace-normal {
            white-space: normal;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .break-words {
            overflow-wrap: break-word;
        }

        .break-all {
            word-break: break-all;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .rounded-b-xl {
            border-bottom-right-radius: 0.75rem;
            border-bottom-left-radius: 0.75rem;
        }

        .rounded-e-lg {
            border-start-end-radius: 0.5rem;
            border-end-end-radius: 0.5rem;
        }

        .rounded-l-lg {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .rounded-l-md {
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
        }

        .rounded-r-lg {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .rounded-r-md {
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
        }

        .rounded-s-lg {
            border-start-start-radius: 0.5rem;
            border-end-start-radius: 0.5rem;
        }

        .rounded-t-xl {
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }

        .border {
            border-width: 1px;
        }

        .border-2 {
            border-width: 2px;
        }

        .border-x-\[0\.5px\] {
            border-left-width: 0.5px;
            border-right-width: 0.5px;
        }

        .border-y {
            border-top-width: 1px;
            border-bottom-width: 1px;
        }

        .\!border-t-0 {
            border-top-width: 0px !important;
        }

        .border-b {
            border-bottom-width: 1px;
        }

        .border-b-0 {
            border-bottom-width: 0px;
        }

        .border-b-2 {
            border-bottom-width: 2px;
        }

        .border-e {
            border-inline-end-width: 1px;
        }

        .border-l-4 {
            border-left-width: 4px;
        }

        .border-r {
            border-right-width: 1px;
        }

        .border-s {
            border-inline-start-width: 1px;
        }

        .border-t {
            border-top-width: 1px;
        }

        .\!border-none {
            border-style: none !important;
        }

        .border-none {
            border-style: none;
        }

        .border-gray-100 {
            --tw-border-opacity: 1;
            border-color: rgb(243 244 246 / var(--tw-border-opacity));
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity));
        }

        .border-gray-300 {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
        }

        .border-gray-400 {
            --tw-border-opacity: 1;
            border-color: rgb(156 163 175 / var(--tw-border-opacity));
        }

        .border-gray-600 {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity));
        }

        .border-green-400 {
            --tw-border-opacity: 1;
            border-color: rgb(49 196 141 / var(--tw-border-opacity));
        }

        .border-green-500 {
            --tw-border-opacity: 1;
            border-color: rgb(14 159 110 / var(--tw-border-opacity));
        }

        .border-indigo-400 {
            --tw-border-opacity: 1;
            border-color: rgb(141 162 251 / var(--tw-border-opacity));
        }

        .border-orange-300 {
            --tw-border-opacity: 1;
            border-color: rgb(253 186 140 / var(--tw-border-opacity));
        }

        .border-red-500 {
            --tw-border-opacity: 1;
            border-color: rgb(240 82 82 / var(--tw-border-opacity));
        }

        .border-transparent {
            border-color: transparent;
        }

        .border-t-gray-200 {
            --tw-border-opacity: 1;
            border-top-color: rgb(229 231 235 / var(--tw-border-opacity));
        }

        .\!bg-gray-50 {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity)) !important;
        }

        .\!bg-gray-700 {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
        }

        .bg-black\/50 {
            background-color: rgb(0 0 0 / 0.5);
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .bg-gray-100\/70 {
            background-color: rgb(243 244 246 / 0.7);
        }

        .bg-gray-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }

        .bg-gray-300 {
            --tw-bg-opacity: 1;
            background-color: rgb(209 213 219 / var(--tw-bg-opacity));
        }

        .bg-gray-400 {
            --tw-bg-opacity: 1;
            background-color: rgb(156 163 175 / var(--tw-bg-opacity));
        }

        .bg-gray-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .bg-gray-500 {
            --tw-bg-opacity: 1;
            background-color: rgb(107 114 128 / var(--tw-bg-opacity));
        }

        .bg-gray-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(75 85 99 / var(--tw-bg-opacity));
        }

        .bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }

        .bg-gray-950\/50 {
            background-color: rgb(3 7 18 / 0.5);
        }

        .bg-green-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(222 247 236 / var(--tw-bg-opacity));
        }

        .bg-green-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 250 247 / var(--tw-bg-opacity));
        }

        .bg-green-50\/50 {
            background-color: rgb(243 250 247 / 0.5);
        }

        .bg-green-500 {
            --tw-bg-opacity: 1;
            background-color: rgb(14 159 110 / var(--tw-bg-opacity));
        }

        .bg-green-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(5 122 85 / var(--tw-bg-opacity));
        }

        .bg-indigo-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(240 245 255 / var(--tw-bg-opacity));
        }

        .bg-indigo-500 {
            --tw-bg-opacity: 1;
            background-color: rgb(104 117 245 / var(--tw-bg-opacity));
        }

        .bg-indigo-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(88 80 236 / var(--tw-bg-opacity));
        }

        .bg-orange-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 236 220 / var(--tw-bg-opacity));
        }

        .bg-orange-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(255 248 241 / var(--tw-bg-opacity));
        }

        .bg-red-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(253 232 232 / var(--tw-bg-opacity));
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(253 242 242 / var(--tw-bg-opacity));
        }

        .bg-red-50\/50 {
            background-color: rgb(253 242 242 / 0.5);
        }

        .bg-red-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(224 36 36 / var(--tw-bg-opacity));
        }

        .bg-red-700 {
            --tw-bg-opacity: 1;
            background-color: rgb(200 30 30 / var(--tw-bg-opacity));
        }

        .bg-slate-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(241 245 249 / var(--tw-bg-opacity));
        }

        .bg-slate-200 {
            --tw-bg-opacity: 1;
            background-color: rgb(226 232 240 / var(--tw-bg-opacity));
        }

        .bg-slate-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(248 250 252 / var(--tw-bg-opacity));
        }

        .bg-transparent {
            background-color: transparent;
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .bg-white\/0 {
            background-color: rgb(255 255 255 / 0);
        }

        .bg-white\/5 {
            background-color: rgb(255 255 255 / 0.05);
        }

        .bg-opacity-25 {
            --tw-bg-opacity: 0.25;
        }

        .bg-opacity-50 {
            --tw-bg-opacity: 0.5;
        }

        .bg-opacity-75 {
            --tw-bg-opacity: 0.75;
        }

        .\!bg-none {
            background-image: none !important;
        }

        .bg-cover {
            background-size: cover;
        }

        .bg-center {
            background-position: center;
        }

        .fill-black {
            fill: #000000;
        }

        .fill-indigo-500 {
            fill: #6875F5;
        }

        .stroke-gray-400 {
            stroke: #9CA3AF;
        }

        .object-cover {
            -o-object-fit: cover;
            object-fit: cover;
        }

        .object-center {
            -o-object-position: center;
            object-position: center;
        }

        .p-0 {
            padding: 0px;
        }

        .p-0\.5 {
            padding: 0.125rem;
        }

        .p-1 {
            padding: 0.25rem;
        }

        .p-1\.5 {
            padding: 0.375rem;
        }

        .p-2 {
            padding: 0.5rem;
        }

        .p-2\.5 {
            padding: 0.625rem;
        }

        .p-3 {
            padding: 0.75rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .px-0 {
            padding-left: 0px;
            padding-right: 0px;
        }

        .px-0\.5 {
            padding-left: 0.125rem;
            padding-right: 0.125rem;
        }

        .px-1 {
            padding-left: 0.25rem;
            padding-right: 0.25rem;
        }

        .px-1\.5 {
            padding-left: 0.375rem;
            padding-right: 0.375rem;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .px-2\.5 {
            padding-left: 0.625rem;
            padding-right: 0.625rem;
        }

        .px-3 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .px-3\.5 {
            padding-left: 0.875rem;
            padding-right: 0.875rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .px-5 {
            padding-left: 1.25rem;
            padding-right: 1.25rem;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .py-0 {
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .py-0\.5 {
            padding-top: 0.125rem;
            padding-bottom: 0.125rem;
        }

        .py-1 {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .py-1\.5 {
            padding-top: 0.375rem;
            padding-bottom: 0.375rem;
        }

        .py-10 {
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .py-2\.5 {
            padding-top: 0.625rem;
            padding-bottom: 0.625rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .py-3\.5 {
            padding-top: 0.875rem;
            padding-bottom: 0.875rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .py-5 {
            padding-top: 1.25rem;
            padding-bottom: 1.25rem;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .py-8 {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .pb-2 {
            padding-bottom: 0.5rem;
        }

        .pb-4 {
            padding-bottom: 1rem;
        }

        .pb-6 {
            padding-bottom: 1.5rem;
        }

        .pe-0 {
            padding-inline-end: 0px;
        }

        .pe-1 {
            padding-inline-end: 0.25rem;
        }

        .pe-2 {
            padding-inline-end: 0.5rem;
        }

        .pe-3 {
            padding-inline-end: 0.75rem;
        }

        .pe-4 {
            padding-inline-end: 1rem;
        }

        .pe-6 {
            padding-inline-end: 1.5rem;
        }

        .pe-8 {
            padding-inline-end: 2rem;
        }

        .pl-3 {
            padding-left: 0.75rem;
        }

        .pr-10 {
            padding-right: 2.5rem;
        }

        .pr-2 {
            padding-right: 0.5rem;
        }

        .ps-0 {
            padding-inline-start: 0px;
        }

        .ps-1 {
            padding-inline-start: 0.25rem;
        }

        .ps-10 {
            padding-inline-start: 2.5rem;
        }

        .ps-2 {
            padding-inline-start: 0.5rem;
        }

        .ps-3 {
            padding-inline-start: 0.75rem;
        }

        .ps-3\.5 {
            padding-inline-start: 0.875rem;
        }

        .ps-4 {
            padding-inline-start: 1rem;
        }

        .ps-\[5\.25rem\] {
            padding-inline-start: 5.25rem;
        }

        .pt-0 {
            padding-top: 0px;
        }

        .pt-1 {
            padding-top: 0.25rem;
        }

        .pt-2 {
            padding-top: 0.5rem;
        }

        .pt-3 {
            padding-top: 0.75rem;
        }

        .pt-4 {
            padding-top: 1rem;
        }

        .pt-5 {
            padding-top: 1.25rem;
        }

        .pt-6 {
            padding-top: 1.5rem;
        }

        .pt-8 {
            padding-top: 2rem;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-justify {
            text-align: justify;
        }

        .text-start {
            text-align: start;
        }

        .text-end {
            text-align: end;
        }

        .align-top {
            vertical-align: top;
        }

        .align-middle {
            vertical-align: middle;
        }

        .align-bottom {
            vertical-align: bottom;
        }

        .font-mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .font-sans {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .font-serif {
            font-family: ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;
        }

        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .text-xs {
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .font-black {
            font-weight: 900;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-extrabold {
            font-weight: 800;
        }

        .font-extralight {
            font-weight: 200;
        }

        .font-light {
            font-weight: 300;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-normal {
            font-weight: 400;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-thin {
            font-weight: 100;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .italic {
            font-style: italic;
        }

        .leading-5 {
            line-height: 1.25rem;
        }

        .leading-6 {
            line-height: 1.5rem;
        }

        .leading-7 {
            line-height: 1.75rem;
        }

        .leading-9 {
            line-height: 2.25rem;
        }

        .leading-loose {
            line-height: 2;
        }

        .leading-relaxed {
            line-height: 1.625;
        }

        .leading-tight {
            line-height: 1.25;
        }

        .tracking-tight {
            letter-spacing: -0.025em;
        }

        .tracking-tighter {
            letter-spacing: -0.05em;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .tracking-widest {
            letter-spacing: 0.1em;
        }

        .text-\[red\] {
            --tw-text-opacity: 1;
            color: rgb(255 0 0 / var(--tw-text-opacity));
        }

        .text-black\/70 {
            color: rgb(0 0 0 / 0.7);
        }

        .text-gray-100 {
            --tw-text-opacity: 1;
            color: rgb(243 244 246 / var(--tw-text-opacity));
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .text-gray-700\/50 {
            color: rgb(55 65 81 / 0.5);
        }

        .text-gray-800 {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity));
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity));
        }

        .text-gray-950 {
            --tw-text-opacity: 1;
            color: rgb(3 7 18 / var(--tw-text-opacity));
        }

        .text-green-400 {
            --tw-text-opacity: 1;
            color: rgb(49 196 141 / var(--tw-text-opacity));
        }

        .text-green-500 {
            --tw-text-opacity: 1;
            color: rgb(14 159 110 / var(--tw-text-opacity));
        }

        .text-green-500\/50 {
            color: rgb(14 159 110 / 0.5);
        }

        .text-green-600 {
            --tw-text-opacity: 1;
            color: rgb(5 122 85 / var(--tw-text-opacity));
        }

        .text-indigo-600 {
            --tw-text-opacity: 1;
            color: rgb(88 80 236 / var(--tw-text-opacity));
        }

        .text-indigo-700 {
            --tw-text-opacity: 1;
            color: rgb(81 69 205 / var(--tw-text-opacity));
        }

        .text-orange-500 {
            --tw-text-opacity: 1;
            color: rgb(255 90 31 / var(--tw-text-opacity));
        }

        .text-red-500 {
            --tw-text-opacity: 1;
            color: rgb(240 82 82 / var(--tw-text-opacity));
        }

        .text-red-600 {
            --tw-text-opacity: 1;
            color: rgb(224 36 36 / var(--tw-text-opacity));
        }

        .text-slate-500 {
            --tw-text-opacity: 1;
            color: rgb(100 116 139 / var(--tw-text-opacity));
        }

        .text-slate-700 {
            --tw-text-opacity: 1;
            color: rgb(51 65 85 / var(--tw-text-opacity));
        }

        .text-slate-800 {
            --tw-text-opacity: 1;
            color: rgb(30 41 59 / var(--tw-text-opacity));
        }

        .text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .underline {
            text-decoration-line: underline;
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .opacity-0 {
            opacity: 0;
        }

        .opacity-10 {
            opacity: 0.1;
        }

        .opacity-100 {
            opacity: 1;
        }

        .opacity-50 {
            opacity: 0.5;
        }

        .opacity-70 {
            opacity: 0.7;
        }

        .opacity-75 {
            opacity: 0.75;
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-inner {
            --tw-shadow: inset 0 2px 4px 0 rgb(0 0 0 / 0.05);
            --tw-shadow-colored: inset 0 2px 4px 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-lg {
            --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-md {
            --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-sm {
            --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .shadow-xl {
            --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .outline-none {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .ring {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-0 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-1 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-2 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-4 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .ring-inset {
            --tw-ring-inset: inset;
        }

        .ring-black {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity));
        }

        .ring-gray-200 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity));
        }

        .ring-gray-300 {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity));
        }

        .ring-gray-600\/10 {
            --tw-ring-color: rgb(75 85 99 / 0.1);
        }

        .ring-gray-900\/10 {
            --tw-ring-color: rgb(17 24 39 / 0.1);
        }

        .ring-gray-950\/10 {
            --tw-ring-color: rgb(3 7 18 / 0.1);
        }

        .ring-gray-950\/5 {
            --tw-ring-color: rgb(3 7 18 / 0.05);
        }

        .ring-white {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(255 255 255 / var(--tw-ring-opacity));
        }

        .ring-white\/10 {
            --tw-ring-color: rgb(255 255 255 / 0.1);
        }

        .ring-opacity-5 {
            --tw-ring-opacity: 0.05;
        }

        .blur {
            --tw-blur: blur(8px);
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .filter {
            filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
        }

        .transition {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-colors {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .transition-opacity {
            transition-property: opacity;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .delay-100 {
            transition-delay: 100ms;
        }

        .duration-100 {
            transition-duration: 100ms;
        }

        .duration-150 {
            transition-duration: 150ms;
        }

        .duration-200 {
            transition-duration: 200ms;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .duration-500 {
            transition-duration: 500ms;
        }

        .duration-75 {
            transition-duration: 75ms;
        }

        .ease-in {
            transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }

        .\[transform\:translateZ\(0\)\] {
            transform: translateZ(0);
        }

        [x-cloak] {
            display: none;
        }

        .button-submit {
            --tw-bg-opacity: 1;
            background-color: rgb(251 191 36 / var(--tw-bg-opacity));
        }

        .dark\:prose-invert:is(.dark *) {
            --tw-prose-body: var(--tw-prose-invert-body);
            --tw-prose-headings: var(--tw-prose-invert-headings);
            --tw-prose-lead: var(--tw-prose-invert-lead);
            --tw-prose-links: var(--tw-prose-invert-links);
            --tw-prose-bold: var(--tw-prose-invert-bold);
            --tw-prose-counters: var(--tw-prose-invert-counters);
            --tw-prose-bullets: var(--tw-prose-invert-bullets);
            --tw-prose-hr: var(--tw-prose-invert-hr);
            --tw-prose-quotes: var(--tw-prose-invert-quotes);
            --tw-prose-quote-borders: var(--tw-prose-invert-quote-borders);
            --tw-prose-captions: var(--tw-prose-invert-captions);
            --tw-prose-kbd: var(--tw-prose-invert-kbd);
            --tw-prose-kbd-shadows: var(--tw-prose-invert-kbd-shadows);
            --tw-prose-code: var(--tw-prose-invert-code);
            --tw-prose-pre-code: var(--tw-prose-invert-pre-code);
            --tw-prose-pre-bg: var(--tw-prose-invert-pre-bg);
            --tw-prose-th-borders: var(--tw-prose-invert-th-borders);
            --tw-prose-td-borders: var(--tw-prose-invert-td-borders);
        }

        .placeholder\:text-gray-400::-moz-placeholder {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .placeholder\:text-gray-400::placeholder {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .before\:absolute::before {
            content: var(--tw-content);
            position: absolute;
        }

        .before\:inset-y-0::before {
            content: var(--tw-content);
            top: 0px;
            bottom: 0px;
        }

        .before\:start-0::before {
            content: var(--tw-content);
            inset-inline-start: 0px;
        }

        .before\:h-full::before {
            content: var(--tw-content);
            height: 100%;
        }

        .before\:w-0::before {
            content: var(--tw-content);
            width: 0px;
        }

        .before\:w-0\.5::before {
            content: var(--tw-content);
            width: 0.125rem;
        }

        .first\:border-s-0:first-child {
            border-inline-start-width: 0px;
        }

        .first\:border-t-0:first-child {
            border-top-width: 0px;
        }

        .last\:border-e-0:last-child {
            border-inline-end-width: 0px;
        }

        .first-of-type\:ps-1:first-of-type {
            padding-inline-start: 0.25rem;
        }

        .last-of-type\:pe-1:last-of-type {
            padding-inline-end: 0.25rem;
        }

        .checked\:ring-0:checked {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus-within\:bg-gray-50:focus-within {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .hover\:border-gray-300:hover {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
        }

        .hover\:bg-gray-100:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .hover\:bg-gray-200:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(229 231 235 / var(--tw-bg-opacity));
        }

        .hover\:bg-gray-300:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(209 213 219 / var(--tw-bg-opacity));
        }

        .hover\:bg-gray-400\/10:hover {
            background-color: rgb(156 163 175 / 0.1);
        }

        .hover\:bg-gray-50:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .hover\:bg-gray-700:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }

        .hover\:bg-green-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(5 122 85 / var(--tw-bg-opacity));
        }

        .hover\:bg-indigo-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(88 80 236 / var(--tw-bg-opacity));
        }

        .hover\:bg-red-100:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(253 232 232 / var(--tw-bg-opacity));
        }

        .hover\:bg-red-500:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(240 82 82 / var(--tw-bg-opacity));
        }

        .hover\:bg-red-600:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(224 36 36 / var(--tw-bg-opacity));
        }

        .hover\:bg-red-800:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(155 28 28 / var(--tw-bg-opacity));
        }

        .hover\:bg-slate-200:hover {
            --tw-bg-opacity: 1;
            background-color: rgb(226 232 240 / var(--tw-bg-opacity));
        }

        .hover\:text-gray-400:hover {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .hover\:text-gray-500:hover {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .hover\:text-gray-700\/75:hover {
            color: rgb(55 65 81 / 0.75);
        }

        .hover\:text-gray-800:hover {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity));
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity));
        }

        .hover\:underline:hover {
            text-decoration-line: underline;
        }

        .hover\:opacity-100:hover {
            opacity: 1;
        }

        .focus\:z-10:focus {
            z-index: 10;
        }

        .focus\:border-blue-300:focus {
            --tw-border-opacity: 1;
            border-color: rgb(164 202 254 / var(--tw-border-opacity));
        }

        .focus\:border-blue-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(63 131 248 / var(--tw-border-opacity));
        }

        .focus\:border-gray-300:focus {
            --tw-border-opacity: 1;
            border-color: rgb(209 213 219 / var(--tw-border-opacity));
        }

        .focus\:border-indigo-500:focus {
            --tw-border-opacity: 1;
            border-color: rgb(104 117 245 / var(--tw-border-opacity));
        }

        .focus\:border-indigo-700:focus {
            --tw-border-opacity: 1;
            border-color: rgb(81 69 205 / var(--tw-border-opacity));
        }

        .focus\:bg-gray-100:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .focus\:bg-gray-50:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .focus\:bg-gray-700:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }

        .focus\:bg-indigo-100:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(229 237 255 / var(--tw-bg-opacity));
        }

        .focus\:bg-indigo-600:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(88 80 236 / var(--tw-bg-opacity));
        }

        .focus\:bg-red-600:focus {
            --tw-bg-opacity: 1;
            background-color: rgb(224 36 36 / var(--tw-bg-opacity));
        }

        .focus\:text-gray-700:focus {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .focus\:text-gray-800:focus {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity));
        }

        .focus\:text-indigo-800:focus {
            --tw-text-opacity: 1;
            color: rgb(66 56 157 / var(--tw-text-opacity));
        }

        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .focus\:ring:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus\:ring-0:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus\:ring-2:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus\:ring-4:focus {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus\:ring-blue-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(63 131 248 / var(--tw-ring-opacity));
        }

        .focus\:ring-gray-200:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(229 231 235 / var(--tw-ring-opacity));
        }

        .focus\:ring-gray-300:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity));
        }

        .focus\:ring-indigo-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(104 117 245 / var(--tw-ring-opacity));
        }

        .focus\:ring-red-300:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(248 180 180 / var(--tw-ring-opacity));
        }

        .focus\:ring-red-500:focus {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(240 82 82 / var(--tw-ring-opacity));
        }

        .focus\:ring-offset-0:focus {
            --tw-ring-offset-width: 0px;
        }

        .focus\:ring-offset-2:focus {
            --tw-ring-offset-width: 2px;
        }

        .focus-visible\:z-10:focus-visible {
            z-index: 10;
        }

        .focus-visible\:bg-gray-100:focus-visible {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .focus-visible\:bg-gray-50:focus-visible {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .focus-visible\:text-gray-500:focus-visible {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .focus-visible\:text-gray-700\/75:focus-visible {
            color: rgb(55 65 81 / 0.75);
        }

        .focus-visible\:outline-none:focus-visible {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .focus-visible\:ring-1:focus-visible {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus-visible\:ring-2:focus-visible {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .focus-visible\:ring-inset:focus-visible {
            --tw-ring-inset: inset;
        }

        .focus-visible\:ring-gray-400\/40:focus-visible {
            --tw-ring-color: rgb(156 163 175 / 0.4);
        }

        .active\:bg-gray-100:active {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }

        .active\:bg-gray-900:active {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }

        .active\:bg-red-700:active {
            --tw-bg-opacity: 1;
            background-color: rgb(200 30 30 / var(--tw-bg-opacity));
        }

        .active\:text-gray-500:active {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .active\:text-gray-700:active {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .enabled\:cursor-wait:enabled {
            cursor: wait;
        }

        .enabled\:opacity-70:enabled {
            opacity: 0.7;
        }

        .disabled\:pointer-events-none:disabled {
            pointer-events: none;
        }

        .disabled\:bg-gray-50:disabled {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .disabled\:text-gray-50:disabled {
            --tw-text-opacity: 1;
            color: rgb(249 250 251 / var(--tw-text-opacity));
        }

        .disabled\:text-gray-500:disabled {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .disabled\:opacity-25:disabled {
            opacity: 0.25;
        }

        .disabled\:opacity-70:disabled {
            opacity: 0.7;
        }

        .disabled\:\[-webkit-text-fill-color\:theme\(colors\.gray\.500\)\]:disabled {
            -webkit-text-fill-color: #6B7280;
        }

        .disabled\:placeholder\:\[-webkit-text-fill-color\:theme\(colors\.gray\.400\)\]:disabled::-moz-placeholder {
            -webkit-text-fill-color: #9CA3AF;
        }

        .disabled\:placeholder\:\[-webkit-text-fill-color\:theme\(colors\.gray\.400\)\]:disabled::placeholder {
            -webkit-text-fill-color: #9CA3AF;
        }

        .disabled\:checked\:bg-current:checked:disabled {
            background-color: currentColor;
        }

        .disabled\:checked\:text-gray-400:checked:disabled {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .group\/item:first-child .group-first\/item\:rounded-s-lg {
            border-start-start-radius: 0.5rem;
            border-end-start-radius: 0.5rem;
        }

        .group\/item:last-child .group-last\/item\:rounded-e-lg {
            border-start-end-radius: 0.5rem;
            border-end-end-radius: 0.5rem;
        }

        .group\/button:hover .group-hover\/button\:text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .group:hover .group-hover\:text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .group:hover .group-hover\:text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .group\/item:hover .group-hover\/item\:underline {
            text-decoration-line: underline;
        }

        .group\/link:hover .group-hover\/link\:underline {
            text-decoration-line: underline;
        }

        .group:focus-visible .group-focus-visible\:text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .group:focus-visible .group-focus-visible\:text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .group\/item:focus-visible .group-focus-visible\/item\:underline {
            text-decoration-line: underline;
        }

        .group\/link:focus-visible .group-focus-visible\/link\:underline {
            text-decoration-line: underline;
        }

        .dark\:flex:is(.dark *) {
            display: flex;
        }

        .dark\:hidden:is(.dark *) {
            display: none;
        }

        .dark\:divide-white\/10:is(.dark *) > :not([hidden]) ~ :not([hidden]) {
            border-color: rgb(255 255 255 / 0.1);
        }

        .dark\:divide-white\/5:is(.dark *) > :not([hidden]) ~ :not([hidden]) {
            border-color: rgb(255 255 255 / 0.05);
        }

        .dark\:border-gray-600:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity));
        }

        .dark\:border-gray-700:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(55 65 81 / var(--tw-border-opacity));
        }

        .dark\:border-white\/10:is(.dark *) {
            border-color: rgb(255 255 255 / 0.1);
        }

        .dark\:border-white\/5:is(.dark *) {
            border-color: rgb(255 255 255 / 0.05);
        }

        .dark\:border-t-white\/10:is(.dark *) {
            border-top-color: rgb(255 255 255 / 0.1);
        }

        .dark\:\!bg-gray-700:is(.dark *) {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity)) !important;
        }

        .dark\:bg-gray-400\/10:is(.dark *) {
            background-color: rgb(156 163 175 / 0.1);
        }

        .dark\:bg-gray-500:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(107 114 128 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-500\/20:is(.dark *) {
            background-color: rgb(107 114 128 / 0.2);
        }

        .dark\:bg-gray-600:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(75 85 99 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-700:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-800:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900\/30:is(.dark *) {
            background-color: rgb(17 24 39 / 0.3);
        }

        .dark\:bg-gray-950:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(3 7 18 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-950\/75:is(.dark *) {
            background-color: rgb(3 7 18 / 0.75);
        }

        .dark\:bg-green-800:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(3 84 63 / var(--tw-bg-opacity));
        }

        .dark\:bg-orange-700:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(180 52 3 / var(--tw-bg-opacity));
        }

        .dark\:bg-red-800:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(155 28 28 / var(--tw-bg-opacity));
        }

        .dark\:bg-transparent:is(.dark *) {
            background-color: transparent;
        }

        .dark\:bg-white\/10:is(.dark *) {
            background-color: rgb(255 255 255 / 0.1);
        }

        .dark\:bg-white\/5:is(.dark *) {
            background-color: rgb(255 255 255 / 0.05);
        }

        .dark\:fill-current:is(.dark *) {
            fill: currentColor;
        }

        .dark\:text-gray-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }

        .dark\:text-gray-300:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .dark\:text-gray-300\/50:is(.dark *) {
            color: rgb(209 213 219 / 0.5);
        }

        .dark\:text-gray-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .dark\:text-gray-500:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .dark\:text-gray-600:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }

        .dark\:text-gray-700:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity));
        }

        .dark\:text-gray-800:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(31 41 55 / var(--tw-text-opacity));
        }

        .dark\:text-green-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(188 240 218 / var(--tw-text-opacity));
        }

        .dark\:text-orange-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(252 217 189 / var(--tw-text-opacity));
        }

        .dark\:text-red-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(251 213 213 / var(--tw-text-opacity));
        }

        .dark\:text-slate-50:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(248 250 252 / var(--tw-text-opacity));
        }

        .dark\:text-white:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .dark\:text-white\/5:is(.dark *) {
            color: rgb(255 255 255 / 0.05);
        }

        .dark\:placeholder-gray-400:is(.dark *)::-moz-placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175 / var(--tw-placeholder-opacity));
        }

        .dark\:placeholder-gray-400:is(.dark *)::placeholder {
            --tw-placeholder-opacity: 1;
            color: rgb(156 163 175 / var(--tw-placeholder-opacity));
        }

        .dark\:ring-gray-400\/20:is(.dark *) {
            --tw-ring-color: rgb(156 163 175 / 0.2);
        }

        .dark\:ring-gray-50\/10:is(.dark *) {
            --tw-ring-color: rgb(249 250 251 / 0.1);
        }

        .dark\:ring-gray-700:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(55 65 81 / var(--tw-ring-opacity));
        }

        .dark\:ring-gray-900:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(17 24 39 / var(--tw-ring-opacity));
        }

        .dark\:ring-white\/10:is(.dark *) {
            --tw-ring-color: rgb(255 255 255 / 0.1);
        }

        .dark\:ring-white\/20:is(.dark *) {
            --tw-ring-color: rgb(255 255 255 / 0.2);
        }

        .dark\:placeholder\:text-gray-500:is(.dark *)::-moz-placeholder {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .dark\:placeholder\:text-gray-500:is(.dark *)::placeholder {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity));
        }

        .dark\:focus-within\:bg-white\/5:focus-within:is(.dark *) {
            background-color: rgb(255 255 255 / 0.05);
        }

        .dark\:hover\:bg-gray-600:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(75 85 99 / var(--tw-bg-opacity));
        }

        .dark\:hover\:bg-gray-700:hover:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }

        .dark\:hover\:bg-white\/10:hover:is(.dark *) {
            background-color: rgb(255 255 255 / 0.1);
        }

        .dark\:hover\:bg-white\/5:hover:is(.dark *) {
            background-color: rgb(255 255 255 / 0.05);
        }

        .dark\:hover\:text-gray-200:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }

        .dark\:hover\:text-gray-300:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .dark\:hover\:text-gray-300\/75:hover:is(.dark *) {
            color: rgb(209 213 219 / 0.75);
        }

        .dark\:hover\:text-gray-400:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .dark\:hover\:text-white:hover:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        .dark\:hover\:ring-white\/20:hover:is(.dark *) {
            --tw-ring-color: rgb(255 255 255 / 0.2);
        }

        .dark\:focus\:border-blue-500:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(63 131 248 / var(--tw-border-opacity));
        }

        .dark\:focus\:border-blue-700:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(26 86 219 / var(--tw-border-opacity));
        }

        .dark\:focus\:border-blue-800:focus:is(.dark *) {
            --tw-border-opacity: 1;
            border-color: rgb(30 66 159 / var(--tw-border-opacity));
        }

        .dark\:focus\:ring-blue-500:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(63 131 248 / var(--tw-ring-opacity));
        }

        .dark\:focus\:ring-gray-600:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(75 85 99 / var(--tw-ring-opacity));
        }

        .dark\:focus\:ring-red-800:focus:is(.dark *) {
            --tw-ring-opacity: 1;
            --tw-ring-color: rgb(155 28 28 / var(--tw-ring-opacity));
        }

        .dark\:focus-visible\:bg-white\/5:focus-visible:is(.dark *) {
            background-color: rgb(255 255 255 / 0.05);
        }

        .dark\:focus-visible\:text-gray-300\/75:focus-visible:is(.dark *) {
            color: rgb(209 213 219 / 0.75);
        }

        .dark\:focus-visible\:text-gray-400:focus-visible:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .dark\:active\:bg-gray-700:active:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }

        .dark\:active\:text-gray-300:active:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .dark\:disabled\:bg-transparent:disabled:is(.dark *) {
            background-color: transparent;
        }

        .dark\:disabled\:text-gray-400:disabled:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .dark\:disabled\:ring-white\/10:disabled:is(.dark *) {
            --tw-ring-color: rgb(255 255 255 / 0.1);
        }

        .dark\:disabled\:\[-webkit-text-fill-color\:theme\(colors\.gray\.400\)\]:disabled:is(.dark *) {
            -webkit-text-fill-color: #9CA3AF;
        }

        .dark\:disabled\:placeholder\:\[-webkit-text-fill-color\:theme\(colors\.gray\.500\)\]:disabled:is(.dark *)::-moz-placeholder {
            -webkit-text-fill-color: #6B7280;
        }

        .dark\:disabled\:placeholder\:\[-webkit-text-fill-color\:theme\(colors\.gray\.500\)\]:disabled:is(.dark *)::placeholder {
            -webkit-text-fill-color: #6B7280;
        }

        .dark\:disabled\:checked\:bg-gray-600:checked:disabled:is(.dark *) {
            --tw-bg-opacity: 1;
            background-color: rgb(75 85 99 / var(--tw-bg-opacity));
        }

        .group\/button:hover .dark\:group-hover\/button\:text-gray-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .group:hover .dark\:group-hover\:text-gray-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }

        .group:hover .dark\:group-hover\:text-gray-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .group:focus-visible .dark\:group-focus-visible\:text-gray-200:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity));
        }

        .group:focus-visible .dark\:group-focus-visible\:text-gray-400:is(.dark *) {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        @media (min-width: 640px) {
            .sm\:relative {
                position: relative;
            }

            .sm\:inset-x-auto {
                left: auto;
                right: auto;
            }

            .sm\:end-0 {
                inset-inline-end: 0px;
            }

            .sm\:col-\[--col-span-sm\] {
                grid-column: var(--col-span-sm);
            }

            .sm\:col-span-2 {
                grid-column: span 2 / span 2;
            }

            .sm\:col-span-4 {
                grid-column: span 4 / span 4;
            }

            .sm\:col-start-\[--col-start-sm\] {
                grid-column-start: var(--col-start-sm);
            }

            .sm\:-mx-6 {
                margin-left: -1.5rem;
                margin-right: -1.5rem;
            }

            .sm\:-my-2 {
                margin-top: -0.5rem;
                margin-bottom: -0.5rem;
            }

            .sm\:mx-0 {
                margin-left: 0px;
                margin-right: 0px;
            }

            .sm\:mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .sm\:-me-2 {
                margin-inline-end: -0.5rem;
            }

            .sm\:ms-3 {
                margin-inline-start: 0.75rem;
            }

            .sm\:ms-4 {
                margin-inline-start: 1rem;
            }

            .sm\:ms-auto {
                margin-inline-start: auto;
            }

            .sm\:mt-0 {
                margin-top: 0px;
            }

            .sm\:mt-7 {
                margin-top: 1.75rem;
            }

            .sm\:block {
                display: block;
            }

            .sm\:flex {
                display: flex;
            }

            .sm\:table-cell {
                display: table-cell;
            }

            .sm\:grid {
                display: grid;
            }

            .sm\:inline-grid {
                display: inline-grid;
            }

            .sm\:hidden {
                display: none;
            }

            .sm\:h-10 {
                height: 2.5rem;
            }

            .sm\:w-10 {
                width: 2.5rem;
            }

            .sm\:w-\[calc\(100\%\+3rem\)\] {
                width: calc(100% + 3rem);
            }

            .sm\:w-full {
                width: 100%;
            }

            .sm\:w-screen {
                width: 100vw;
            }

            .sm\:max-w-2xl {
                max-width: 42rem;
            }

            .sm\:max-w-3xl {
                max-width: 48rem;
            }

            .sm\:max-w-4xl {
                max-width: 56rem;
            }

            .sm\:max-w-5xl {
                max-width: 64rem;
            }

            .sm\:max-w-6xl {
                max-width: 72rem;
            }

            .sm\:max-w-7xl {
                max-width: 80rem;
            }

            .sm\:max-w-lg {
                max-width: 32rem;
            }

            .sm\:max-w-md {
                max-width: 28rem;
            }

            .sm\:max-w-sm {
                max-width: 24rem;
            }

            .sm\:max-w-xl {
                max-width: 36rem;
            }

            .sm\:max-w-xs {
                max-width: 20rem;
            }

            .sm\:flex-1 {
                flex: 1 1 0%;
            }

            .sm\:translate-y-0 {
                --tw-translate-y: 0px;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .sm\:scale-100 {
                --tw-scale-x: 1;
                --tw-scale-y: 1;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .sm\:scale-95 {
                --tw-scale-x: .95;
                --tw-scale-y: .95;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .sm\:columns-\[--cols-sm\] {
                -moz-columns: var(--cols-sm);
                columns: var(--cols-sm);
            }

            .sm\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .sm\:grid-cols-\[--cols-sm\] {
                grid-template-columns: var(--cols-sm);
            }

            .sm\:grid-cols-\[repeat\(auto-fit\2c minmax\(0\2c 1fr\)\)\] {
                grid-template-columns: repeat(auto-fit,minmax(0,1fr));
            }

            .sm\:grid-rows-\[1fr_auto_3fr\] {
                grid-template-rows: 1fr auto 3fr;
            }

            .sm\:flex-row {
                flex-direction: row;
            }

            .sm\:flex-nowrap {
                flex-wrap: nowrap;
            }

            .sm\:items-start {
                align-items: flex-start;
            }

            .sm\:items-end {
                align-items: flex-end;
            }

            .sm\:items-center {
                align-items: center;
            }

            .sm\:justify-start {
                justify-content: flex-start;
            }

            .sm\:justify-center {
                justify-content: center;
            }

            .sm\:justify-between {
                justify-content: space-between;
            }

            .sm\:gap-1 {
                gap: 0.25rem;
            }

            .sm\:gap-3 {
                gap: 0.75rem;
            }

            .sm\:gap-x-4 {
                -moz-column-gap: 1rem;
                column-gap: 1rem;
            }

            .sm\:rounded-2xl {
                border-radius: 1rem;
            }

            .sm\:rounded-lg {
                border-radius: 0.5rem;
            }

            .sm\:rounded-md {
                border-radius: 0.375rem;
            }

            .sm\:rounded-xl {
                border-radius: 0.75rem;
            }

            .sm\:rounded-bl-md {
                border-bottom-left-radius: 0.375rem;
            }

            .sm\:rounded-br-md {
                border-bottom-right-radius: 0.375rem;
            }

            .sm\:rounded-tl-md {
                border-top-left-radius: 0.375rem;
            }

            .sm\:rounded-tr-md {
                border-top-right-radius: 0.375rem;
            }

            .sm\:p-10 {
                padding: 2.5rem;
            }

            .sm\:p-6 {
                padding: 1.5rem;
            }

            .sm\:px-0 {
                padding-left: 0px;
                padding-right: 0px;
            }

            .sm\:px-12 {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .sm\:py-1 {
                padding-top: 0.25rem;
                padding-bottom: 0.25rem;
            }

            .sm\:py-1\.5 {
                padding-top: 0.375rem;
                padding-bottom: 0.375rem;
            }

            .sm\:pb-4 {
                padding-bottom: 1rem;
            }

            .sm\:pe-3 {
                padding-inline-end: 0.75rem;
            }

            .sm\:pe-6 {
                padding-inline-end: 1.5rem;
            }

            .sm\:ps-3 {
                padding-inline-start: 0.75rem;
            }

            .sm\:ps-6 {
                padding-inline-start: 1.5rem;
            }

            .sm\:pt-0 {
                padding-top: 0px;
            }

            .sm\:pt-1 {
                padding-top: 0.25rem;
            }

            .sm\:pt-1\.5 {
                padding-top: 0.375rem;
            }

            .sm\:text-start {
                text-align: start;
            }

            .sm\:text-3xl {
                font-size: 1.875rem;
                line-height: 2.25rem;
            }

            .sm\:text-sm {
                font-size: 0.875rem;
                line-height: 1.25rem;
            }

            .sm\:leading-6 {
                line-height: 1.5rem;
            }

            .sm\:first-of-type\:ps-3:first-of-type {
                padding-inline-start: 0.75rem;
            }

            .sm\:first-of-type\:ps-6:first-of-type {
                padding-inline-start: 1.5rem;
            }

            .sm\:last-of-type\:pe-3:last-of-type {
                padding-inline-end: 0.75rem;
            }

            .sm\:last-of-type\:pe-6:last-of-type {
                padding-inline-end: 1.5rem;
            }
        }

        @media (min-width: 768px) {
            .md\:bottom-4 {
                bottom: 1rem;
            }

            .md\:order-first {
                order: -9999;
            }

            .md\:col-\[--col-span-md\] {
                grid-column: var(--col-span-md);
            }

            .md\:col-span-1 {
                grid-column: span 1 / span 1;
            }

            .md\:col-span-2 {
                grid-column: span 2 / span 2;
            }

            .md\:col-start-\[--col-start-md\] {
                grid-column-start: var(--col-start-md);
            }

            .md\:mt-0 {
                margin-top: 0px;
            }

            .md\:block {
                display: block;
            }

            .md\:flex {
                display: flex;
            }

            .md\:table-cell {
                display: table-cell;
            }

            .md\:grid {
                display: grid;
            }

            .md\:inline-grid {
                display: inline-grid;
            }

            .md\:hidden {
                display: none;
            }

            .md\:w-auto {
                width: auto;
            }

            .md\:w-max {
                width: -moz-max-content;
                width: max-content;
            }

            .md\:max-w-60 {
                max-width: 15rem;
            }

            .md\:columns-\[--cols-md\] {
                -moz-columns: var(--cols-md);
                columns: var(--cols-md);
            }

            .md\:grid-flow-col {
                grid-auto-flow: column;
            }

            .md\:grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .md\:grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .md\:grid-cols-\[--cols-md\] {
                grid-template-columns: var(--cols-md);
            }

            .md\:flex-row {
                flex-direction: row;
            }

            .md\:items-start {
                align-items: flex-start;
            }

            .md\:items-end {
                align-items: flex-end;
            }

            .md\:items-center {
                align-items: center;
            }

            .md\:justify-end {
                justify-content: flex-end;
            }

            .md\:gap-1 {
                gap: 0.25rem;
            }

            .md\:gap-3 {
                gap: 0.75rem;
            }

            .md\:gap-6 {
                gap: 1.5rem;
            }

            .md\:divide-y-0 > :not([hidden]) ~ :not([hidden]) {
                --tw-divide-y-reverse: 0;
                border-top-width: calc(0px * calc(1 - var(--tw-divide-y-reverse)));
                border-bottom-width: calc(0px * var(--tw-divide-y-reverse));
            }

            .md\:overflow-x-auto {
                overflow-x: auto;
            }

            .md\:rounded-xl {
                border-radius: 0.75rem;
            }

            .md\:p-20 {
                padding: 5rem;
            }

            .md\:p-5 {
                padding: 1.25rem;
            }

            .md\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem;
            }

            .md\:pe-6 {
                padding-inline-end: 1.5rem;
            }

            .md\:ps-3 {
                padding-inline-start: 0.75rem;
            }
        }

        @media (min-width: 1024px) {
            .lg\:sticky {
                position: sticky;
            }

            .lg\:z-0 {
                z-index: 0;
            }

            .lg\:col-\[--col-span-lg\] {
                grid-column: var(--col-span-lg);
            }

            .lg\:col-start-\[--col-start-lg\] {
                grid-column-start: var(--col-start-lg);
            }

            .lg\:block {
                display: block;
            }

            .lg\:flex {
                display: flex;
            }

            .lg\:table-cell {
                display: table-cell;
            }

            .lg\:inline-grid {
                display: inline-grid;
            }

            .lg\:hidden {
                display: none;
            }

            .lg\:h-full {
                height: 100%;
            }

            .lg\:max-w-xs {
                max-width: 20rem;
            }

            .lg\:-translate-x-full {
                --tw-translate-x: -100%;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .lg\:translate-x-0 {
                --tw-translate-x: 0px;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .lg\:columns-\[--cols-lg\] {
                -moz-columns: var(--cols-lg);
                columns: var(--cols-lg);
            }

            .lg\:grid-cols-\[--cols-lg\] {
                grid-template-columns: var(--cols-lg);
            }

            .lg\:flex-row {
                flex-direction: row;
            }

            .lg\:items-start {
                align-items: flex-start;
            }

            .lg\:items-end {
                align-items: flex-end;
            }

            .lg\:items-center {
                align-items: center;
            }

            .lg\:gap-1 {
                gap: 0.25rem;
            }

            .lg\:gap-3 {
                gap: 0.75rem;
            }

            .lg\:gap-8 {
                gap: 2rem;
            }

            .lg\:bg-transparent {
                background-color: transparent;
            }

            .lg\:p-8 {
                padding: 2rem;
            }

            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .lg\:pe-8 {
                padding-inline-end: 2rem;
            }

            .lg\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .lg\:shadow-sm {
                --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
                --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
            }

            .lg\:ring-0 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
            }

            .lg\:transition {
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }

            .lg\:transition-none {
                transition-property: none;
            }

            .lg\:delay-100 {
                transition-delay: 100ms;
            }

            .dark\:lg\:bg-transparent:is(.dark *) {
                background-color: transparent;
            }
        }

        @media (min-width: 1280px) {
            .xl\:col-\[--col-span-xl\] {
                grid-column: var(--col-span-xl);
            }

            .xl\:col-start-\[--col-start-xl\] {
                grid-column-start: var(--col-start-xl);
            }

            .xl\:block {
                display: block;
            }

            .xl\:table-cell {
                display: table-cell;
            }

            .xl\:inline-grid {
                display: inline-grid;
            }

            .xl\:hidden {
                display: none;
            }

            .xl\:columns-\[--cols-xl\] {
                -moz-columns: var(--cols-xl);
                columns: var(--cols-xl);
            }

            .xl\:grid-cols-4 {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .xl\:grid-cols-\[--cols-xl\] {
                grid-template-columns: var(--cols-xl);
            }

            .xl\:flex-row {
                flex-direction: row;
            }

            .xl\:items-start {
                align-items: flex-start;
            }

            .xl\:items-end {
                align-items: flex-end;
            }

            .xl\:items-center {
                align-items: center;
            }

            .xl\:gap-1 {
                gap: 0.25rem;
            }

            .xl\:gap-3 {
                gap: 0.75rem;
            }
        }

        @media (min-width: 1536px) {
            .\32xl\:col-\[--col-span-2xl\] {
                grid-column: var(--col-span-2xl);
            }

            .\32xl\:col-start-\[--col-start-2xl\] {
                grid-column-start: var(--col-start-2xl);
            }

            .\32xl\:block {
                display: block;
            }

            .\32xl\:table-cell {
                display: table-cell;
            }

            .\32xl\:inline-grid {
                display: inline-grid;
            }

            .\32xl\:hidden {
                display: none;
            }

            .\32xl\:columns-\[--cols-2xl\] {
                -moz-columns: var(--cols-2xl);
                columns: var(--cols-2xl);
            }

            .\32xl\:grid-cols-\[--cols-2xl\] {
                grid-template-columns: var(--cols-2xl);
            }

            .\32xl\:flex-row {
                flex-direction: row;
            }

            .\32xl\:items-start {
                align-items: flex-start;
            }

            .\32xl\:items-end {
                align-items: flex-end;
            }

            .\32xl\:items-center {
                align-items: center;
            }

            .\32xl\:gap-1 {
                gap: 0.25rem;
            }

            .\32xl\:gap-3 {
                gap: 0.75rem;
            }
        }

        .ltr\:hidden:where([dir="ltr"], [dir="ltr"] *) {
            display: none;
        }

        .ltr\:origin-top-left:where([dir="ltr"], [dir="ltr"] *) {
            transform-origin: top left;
        }

        .ltr\:origin-top-right:where([dir="ltr"], [dir="ltr"] *) {
            transform-origin: top right;
        }

        .rtl\:hidden:where([dir="rtl"], [dir="rtl"] *) {
            display: none;
        }

        .rtl\:origin-top-left:where([dir="rtl"], [dir="rtl"] *) {
            transform-origin: top left;
        }

        .rtl\:origin-top-right:where([dir="rtl"], [dir="rtl"] *) {
            transform-origin: top right;
        }

        .rtl\:-translate-x-0:where([dir="rtl"], [dir="rtl"] *) {
            --tw-translate-x: -0px;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rtl\:-translate-x-5:where([dir="rtl"], [dir="rtl"] *) {
            --tw-translate-x: -1.25rem;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rtl\:-translate-x-full:where([dir="rtl"], [dir="rtl"] *) {
            --tw-translate-x: -100%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rtl\:translate-x-1\/2:where([dir="rtl"], [dir="rtl"] *) {
            --tw-translate-x: 50%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rtl\:translate-x-full:where([dir="rtl"], [dir="rtl"] *) {
            --tw-translate-x: 100%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rtl\:rotate-180:where([dir="rtl"], [dir="rtl"] *) {
            --tw-rotate: 180deg;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .rtl\:flex-row-reverse:where([dir="rtl"], [dir="rtl"] *) {
            flex-direction: row-reverse;
        }

        .rtl\:divide-x-reverse:where([dir="rtl"], [dir="rtl"] *) > :not([hidden]) ~ :not([hidden]) {
            --tw-divide-x-reverse: 1;
        }

        @media (min-width: 1024px) {
            .rtl\:lg\:-translate-x-0:where([dir="rtl"], [dir="rtl"] *) {
                --tw-translate-x: -0px;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }

            .rtl\:lg\:translate-x-full:where([dir="rtl"], [dir="rtl"] *) {
                --tw-translate-x: 100%;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            }
        }

        .\[\&\.trix-active\]\:bg-gray-50.trix-active {
            --tw-bg-opacity: 1;
            background-color: rgb(249 250 251 / var(--tw-bg-opacity));
        }

        .dark\:\[\&\.trix-active\]\:bg-white\/5.trix-active:is(.dark *) {
            background-color: rgb(255 255 255 / 0.05);
        }

        .\[\&\:\:-ms-reveal\]\:hidden::-ms-reveal {
            display: none;
        }

        .\[\&\:not\(\:first-of-type\)\]\:border-s:not(:first-of-type) {
            border-inline-start-width: 1px;
        }

        .\[\&\:not\(\:has\(\.fi-ac-action\:focus\)\)\]\:focus-within\:ring-2:focus-within:not(:has(.fi-ac-action:focus)) {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        .\[\&\:not\(\:last-of-type\)\]\:border-e:not(:last-of-type) {
            border-inline-end-width: 1px;
        }

        .\[\&\:not\(\:nth-child\(1_of_\.fi-btn\)\)\]\:shadow-\[-1px_0_0_0_theme\(colors\.gray\.200\)\]:not(:nth-child(1 of .fi-btn)) {
            --tw-shadow: -1px 0 0 0 #E5E7EB;
            --tw-shadow-colored: -1px 0 0 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .dark\:\[\&\:not\(\:nth-child\(1_of_\.fi-btn\)\)\]\:shadow-\[-1px_0_0_0_theme\(colors\.white\/20\%\)\]:not(:nth-child(1 of .fi-btn)):is(.dark *) {
            --tw-shadow: -1px 0 0 0 rgb(255 255 255 / 20%);
            --tw-shadow-colored: -1px 0 0 0 var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
        }

        .\[\&\:not\(\:nth-last-child\(1_of_\.fi-btn\)\)\]\:me-px:not(:nth-last-child(1 of .fi-btn)) {
            margin-inline-end: 1px;
        }

        .\[\&\:nth-child\(1_of_\.fi-btn\)\]\:rounded-s-lg:nth-child(1 of .fi-btn) {
            border-start-start-radius: 0.5rem;
            border-end-start-radius: 0.5rem;
        }

        .\[\&\:nth-last-child\(1_of_\.fi-btn\)\]\:rounded-e-lg:nth-last-child(1 of .fi-btn) {
            border-start-end-radius: 0.5rem;
            border-end-end-radius: 0.5rem;
        }

        .\[\&\>\*\:first-child\]\:relative>*:first-child {
            position: relative;
        }

        .\[\&\>\*\:first-child\]\:mt-0>*:first-child {
            margin-top: 0px;
        }

        .\[\&\>\*\:first-child\]\:before\:absolute>*:first-child::before {
            content: var(--tw-content);
            position: absolute;
        }

        .\[\&\>\*\:first-child\]\:before\:inset-y-0>*:first-child::before {
            content: var(--tw-content);
            top: 0px;
            bottom: 0px;
        }

        .\[\&\>\*\:first-child\]\:before\:start-0>*:first-child::before {
            content: var(--tw-content);
            inset-inline-start: 0px;
        }

        .\[\&\>\*\:first-child\]\:before\:w-0\.5>*:first-child::before {
            content: var(--tw-content);
            width: 0.125rem;
        }

        .\[\&\>\*\:last-child\]\:mb-0>*:last-child {
            margin-bottom: 0px;
        }

        .\[\&_\.choices\\_\\_inner\]\:ps-0 .choices__inner {
            padding-inline-start: 0px;
        }

        .\[\&_\.fi-badge-delete-button\]\:hidden .fi-badge-delete-button {
            display: none;
        }

        .\[\&_\.filepond--root\]\:font-sans .filepond--root {
            font-family: Figtree, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .\[\&_optgroup\]\:bg-white optgroup {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .\[\&_optgroup\]\:dark\:bg-gray-900:is(.dark *) optgroup {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }

        .\[\&_option\]\:bg-white option {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .\[\&_option\]\:dark\:bg-gray-900:is(.dark *) option {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }

        :checked+*>.\[\:checked\+\*\>\&\]\:text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        @media(hover:hover) {
            .\[\@media\(hover\:hover\)\]\:transition {
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
                transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
                transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
                transition-duration: 150ms;
            }

            .\[\@media\(hover\:hover\)\]\:duration-75 {
                transition-duration: 75ms;
            }
        }

        input:checked+.\[input\:checked\+\&\]\:text-white {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity));
        }

        input:checked+.\[input\:checked\+\&\]\:ring-0 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        input:focus-visible+.\[input\:focus-visible\+\&\]\:z-10 {
            z-index: 10;
        }

        input:focus-visible+.\[input\:focus-visible\+\&\]\:ring-2 {
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
        }

        input:focus-visible+.\[input\:focus-visible\+\&\]\:ring-gray-950\/10 {
            --tw-ring-color: rgb(3 7 18 / 0.1);
        }

        input:focus-visible+.dark\:\[input\:focus-visible\+\&\]\:ring-white\/20:is(.dark *) {
            --tw-ring-color: rgb(255 255 255 / 0.2);
        }
    </style>
</head>
<body>
<div class="m-10 p-8 flex flex-col gap-4">
    <div class="flex flex-col gap-2">
        <div class="flex flex-col px-3 bg-slate-50 rounded-md w-fit divide-y-2 divide-slate-300">
            <p class="font-black text-2xl text-slate-800 py-2">{{ $studySession->studyGroup->course->first()->name }}</p>
            <p class="text-sm font-semibold py-2">{{ $studySession->studyGroup->name }}</p>
        </div>
        <div class="flex gap-2 items-center">
            <p class="bg-slate-50 w-fit px-3 py-1 rounded-md">
                {{ $studySession->date->format('D') }}, {{ $studySession->date->format('d-m-Y') }} |
                {{ $studySession->from_time->format('H:i') }} to {{ $studySession->to_time->format('H:i') }}
            </p>
            <div class="flex bg-slate-50 w-fit p-1 rounded-md">
                <p class="text-slate-700 text-xs font-semibold p-1 px-2 bg-white rounded-md">Centre:</p>
                <p class="px-2">
                    {{ $studySession->studyGroup->location->address_line?? 'Teacher' }}
                </p>
            </div>
            <div class="flex bg-slate-50 w-fit p-1 rounded-md">
                <p class="text-slate-700 text-xs font-semibold p-1 px-2 bg-white rounded-md">Teacher:</p>
                <p class="px-2">
                    {{ $studySession->studyGroup->teachers()->first()->name?? 'Teacher' }}
                </p>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center border rounded-xl divide-y">
        @foreach($studySession->students as $student)
            <div class="student">
                <div class="flex gap-2 justify-between items-center p-2">
                    <div class="flex items-center gap-2">
                        <p class="p-1 rounded-md bg-slate-50 w-8 text-center">{{ $loop->iteration }}</p>
                        <p>{{ $student->name }}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        @if( $student->pivot->status === 'late' )
                        <p class="text-xs text-orange-500 px-2 py-1 rounded-md bg-orange-50 border border-orange-300">
                            Late
                        </p>
                        @endif
                        <div class="flex /overflow-hidden text-sm font-semibold text-black/70 w-[108px]">
                            @if( $student->pivot->attended )
                                <div class="flex items-center px-2 py-1 bg-green-50/50 border border-green-500 rounded-lg gap-1 justify-between w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="flex-grow">Attended</p>
                                </div>
                            @else
                                <div class="flex items-center px-2 py-1 bg-red-50/50 border border-red-500 rounded-lg gap-1 justify-between w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="red" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>

                                    <p class="flex-grow">Absent</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
