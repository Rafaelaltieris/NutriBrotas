import './bootstrap';
import { confirmDelete } from './confirmDelete';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.confirmDelete = confirmDelete;

