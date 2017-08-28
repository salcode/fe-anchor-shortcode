# Anchor Shortcode Plugin

This WordPress plugin makes it easy to add an anchor location.

## Rules for Anchor IDs

The `ID` should begin with a lower-case letter and be followed by any number of
lower-case letters (`a-z`), digits (`0-9`), hyphens (`-`), and underscores (`_`).
There should be no more than one hypen (`-`) in a row.

When the anchor is displayed, the WordPress function [esc_attr()](https://developer.wordpress.org/reference/functions/esc_attr/) is applied to the `ID`.

## Manually Adding an Anchor Location

You can add an anchor location manually by adding the shortcode

```
[anchor id="second-section"]
```

You can now link to this with a URL like `http://example.com/page#second-section`
or `#second-section` for anchors on the same page.

## Adding an Anchor Location with the WYSIWYG Editor

You can add the anchor shortcode with the TinyMCE button that looks like an anchor.

When you click this button, you'll be prompted for the `ID` you want to use.

### Rules Enforced by the WYSIWYG Editor

You should follow the rules outlined above in __Rules for Anchor IDs__.

The `ID` rules will be enforced when the anchor is added with the WYSIWYG editor:

- By applying the WordPress function [sanitize_title()](https://codex.wordpress.org/Function_Reference/sanitize_title)
- If the `ID` does __not__ begin with a letter, the `ID` will be prefixed with `my-`

#### Examples

##### Special Characters and Spaces

If you enter `Spaces, -Dashes-, and other ch@racter$ are %REMOVED%!`, the result is

```
[anchor id="spaces-dashes-and-other-chracter-are-removed"]
```

##### Failing to Start with a Letter

If you enter `5-dogs-in-a-row`, the result is

```
[anchor id="my-5-dogs-in-a-row"]
```

## Output

The shortcode `[anchor id="my-anchor-id"]` will output

```
<span class="fe-anchor" id="my-anchor-id"></span>
```

### Class .fe-anchor

The class `.fe-anchor` is included on all anchors output as a generic target
for future JavaScript or CSS.

## Credits

[Sal Ferrarello](https://salferrarello.com) / [@salcode](https://twitter.com/salcode)

Anchor Icon from [Feather Icons](https://feathericons.com/)
