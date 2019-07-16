import { Id } from '@ephox/katamari';

const ExclusivityChannel = Id.generate('tooltip.exclusive');

const ShowTooltipEvent = Id.generate('show');
const HideTooltipEvent = Id.generate('tooltip.hide');

export {
  ExclusivityChannel,
  ShowTooltipEvent,
  HideTooltipEvent
};