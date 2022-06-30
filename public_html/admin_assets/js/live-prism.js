class livePrsimCore {
    static getCurrentlivePrsimCorePosition(parentElement = document.activeElement) {
        var selection = window.getSelection(),
            charCount = -1,
            node;

        if (selection.focusNode) {
            if (livePrsimCore._isChildOf(selection.focusNode, parentElement)) {
                node = selection.focusNode;
                charCount = selection.focusOffset;

                while (node) {
                    if (node === parentElement) {
                        break;
                    }

                    if (node.previousSibling) {
                        node = node.previousSibling;
                        charCount += node.textContent.length;
                    } else {
                        node = node.parentNode;
                        if (node === null) {
                            break;
                        }
                    }
                }
            }
        }

        return charCount;
    }

    static setCurrentlivePrsimCorePosition(chars, element = document.activeElement) {
        if (chars >= 0) {
            var selection = window.getSelection();

            let range = livePrsimCore._createRange(element, {
                count: chars
            });

            if (range) {
                range.collapse(false);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }
    }

    static _createRange(node, chars, range) {
        if (!range) {
            range = document.createRange()
            range.selectNode(node);
            range.setStart(node, 0);
        }

        if (chars.count === 0) {
            range.setEnd(node, chars.count);
        } else if (node && chars.count > 0) {
            if (node.nodeType === Node.TEXT_NODE) {
                if (node.textContent.length < chars.count) {
                    chars.count -= node.textContent.length;
                } else {
                    range.setEnd(node, chars.count);
                    chars.count = 0;
                }
            } else {
                for (var lp = 0; lp < node.childNodes.length; lp++) {
                    range = livePrsimCore._createRange(node.childNodes[lp], chars, range);

                    if (chars.count === 0) {
                        break;
                    }
                }
            }
        }

        return range;
    }

    static _isChildOf(node, parentElement) {
        while (node !== null) {
            if (node === parentElement) return true;
            node = node.parentNode;
        }
        return false;
    }

    static type(text, el = document.activeElement) {
        let caret = livePrsimCore.getCurrentlivePrsimCorePosition(el),
            is = $(el),
            start = is.text().substr(0, caret),
            end = is.text().substr(caret);

        livePrsimCore.parse(el, start + text + end, text.length);
    }

    static parse(is, text = null, plus = 0) {

        let w = $(is), lang = w.attr('data-lang');
        if (!w.attr('id')) w.attr('id', Math.random().toString().split('.').pop());
        if ([...$.livePrismCache['history']['list']].indexOf(w.text()) < 0) {
            $.livePrismCache['history']['list'].push(w.text());
            $.livePrismCache['history']['index'] = ($.livePrismCache['history']['list'].length - 1);
        }

        let last_caret = livePrsimCore.getCurrentlivePrsimCorePosition(is);
        
        if (!Prism.languages[lang]) lang = 'html';
        
        w.html(Prism.highlight((text ? text : w.text()), Prism.languages[lang], lang));
        livePrsimCore.setCurrentlivePrsimCorePosition((last_caret + plus), is);
    }
}

$.livePrismCache = {
    history: {
        index: -1,
        list: []
    }
};

$.livePrsim = (w) => {
    $(w).on('input', function () {
        livePrsimCore.parse(this);
    }).on('keydown', function (e) {
        if (e.keyCode == 9) {
            e.preventDefault();
            livePrsimCore.type('    ', this);
        }

        if (e.ctrlKey) {
            if (e.key === 's' || e.key === 'S') {
                e.preventDefault();
                livePrismCallback[$(this).attr('id')]['save']();
            }

            if ((e.key == 'y' || e.key == 'Y') || (e.key == 'z' || e.key == 'Z')) {
                if ($.livePrismCache['history']['index'] <= 0) $.livePrismCache['history']['index'] = 0;
                if ($.livePrismCache['history']['index'] >= ($.livePrismCache['history']['list'].length - 1)) $.livePrismCache['history']['index'] = ($.livePrismCache['history']['list'].length - 1);
            }

            if (e.key == 'y' || e.key == 'Y') {
                e.preventDefault();
                livePrsimCore.parse(this, $.livePrismCache['history']['list'][++$.livePrismCache['history']['index']]);
            }

            if (e.key == 'z' || e.key == 'Z') {
                e.preventDefault();
                livePrsimCore.parse(this, $.livePrismCache['history']['list'][--$.livePrismCache['history']['index']]);
            }
        }
    }).trigger('input');
};

$('code[data-lang][contenteditable]').each((_, item) => $.livePrsim(item));