import './bootstrap';

import {livewire_hot_reload} from 'virtual:livewire-hot-reload'

livewire_hot_reload();

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
