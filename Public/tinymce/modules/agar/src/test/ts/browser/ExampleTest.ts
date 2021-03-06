import { UnitTest } from '@ephox/bedrock';
import { document, setTimeout } from '@ephox/dom-globals';
import { Class, Css, DomEvent, Element, Html, Insert, InsertAll, Remove } from '@ephox/sugar';
import { Chain } from 'ephox/agar/api/Chain';
import * as Guard from 'ephox/agar/api/Guard';
import * as Mouse from 'ephox/agar/api/Mouse';
import { Pipeline } from 'ephox/agar/api/Pipeline';
import * as UiFinder from 'ephox/agar/api/UiFinder';

UnitTest.asynctest('Example for Tutorial', function () {
  const success = arguments[arguments.length - 2];
  const failure = arguments[arguments.length - 1];

  const makeSource = function () {
    const editor = Element.fromTag('div');
    Class.add(editor, 'editor');
    // Css.set(editor, 'display', 'none');

    const showButton = Element.fromTag('button');
    Class.add(showButton, 'show');
    Html.set(showButton, 'Show');

    const dialog = Element.fromTag('div');
    Class.add(dialog, 'dialog');
    Css.setAll(dialog, {
      width: '300px',
      height: '200px',
      border: '1px solid black',
      position: 'absolute',
      left: '100px',
      top: '100px',
      background: 'white'
    });
    const dialogContent = Element.fromTag('textarea');
    Html.set(dialogContent, 'Look at this dialog ... wow!');

    const cancelButton = Element.fromTag('button');
    Html.set(cancelButton, 'Cancel');
    Class.add(cancelButton, 'cancel');

    InsertAll.append(dialog, [dialogContent, cancelButton]);

    Insert.append(editor, showButton);

    setTimeout(function () {
      Insert.append(Element.fromDom(document.body), editor);
    }, 1000);

    const onClick = DomEvent.bind(showButton, 'click', function () {
      setTimeout(function () {
        Insert.append(editor, dialog);
      }, 1000);
      onClick.unbind();
    });

    const onCancel = DomEvent.bind(cancelButton, 'click', function () {
      setTimeout(function () {
        Remove.remove(dialog);
      }, 1000);
      onCancel.unbind();
    });

    return editor;
  };

  const source = makeSource();

  const body = Element.fromDom(document.body);

  Pipeline.async({}, [
    // Inject as the first input: body
    Chain.asStep(body, [
      // Input: > container, output: visible element
      UiFinder.cWaitForVisible('Waiting for ".editor" to be visible', '.editor'),
      Mouse.cClickOn('show'),
      Chain.inject(body),
      UiFinder.cWaitForVisible('Waiting for ".dialog" to be visible', '.dialog'),
      Mouse.cClickOn('button.cancel'),
      Chain.inject(body),
      Chain.control(
        UiFinder.cFindIn('.dialog'),
        Guard.tryUntilNot('Keep going until .dialog is not in the DOM', 100, 2000)
      )
    ])
  ], function () {
    Remove.remove(source);
    success();
  }, failure);
});

