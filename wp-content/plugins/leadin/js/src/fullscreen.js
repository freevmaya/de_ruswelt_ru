import $ from 'jquery';
import { domElements } from './constants/selectors';

export default function enterFullScreen() {
  $(domElements.iframe).addClass('leadin-iframe-fullscreen');
}

export function exitFullScreen() {
  $(domElements.iframe).removeClass('leadin-iframe-fullscreen');
}
