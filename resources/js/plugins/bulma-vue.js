import Container from './components/layout/Container.vue';
import Hero from './components/layout/Hero.vue';
import HeroBody from './components/layout/HeroBody.vue';
import Columns from './components/layout/Columns.vue';
import Column from './components/layout/Column.vue';
import Level from './components/layout/Level.vue';


import Box from './components/elements/Box.vue';
import Field from './components/elements/Field.vue';
import FieldLabel from './components/elements/FieldLabel.vue';
import FieldBody from './components/elements/FieldBody.vue';
import Control from './components/elements/Control.vue';
import Help from './components/elements/Help.vue';
import Icon from './components/elements/Icon.vue';
import Tag from './components/elements/Tag.vue';

import BvTable from './components/elements/BvTable.vue';
import Row from './components/elements/Row.vue';
import BvTitle from './components/elements/BvTitle.vue';
import FieldControl from './components/elements/FieldControl.vue';
import Notification from './components/elements/Notification.vue';


import Navbar from './components/components/Navbar.vue';
import NavbarStart from './components/components/NavbarStart.vue';
import NavbarEnd from './components/components/NavbarEnd.vue';
import NavbarItem from './components/components/NavbarItem.vue';
import NavbarItemDropdown from './components/components/NavbarItemDropdown.vue';
import NavbarDropdown from './components/components/NavbarDropdown.vue';
import Modal from './components/components/Modal.vue';
import ModalCard from './components/components/ModalCard.vue';
import ModalCardHead from './components/components/ModalCardHead.vue';
import ModalCardBody from './components/components/ModalCardBody.vue';
import ModalCardFoot from './components/components/ModalCardFoot.vue';
import Pagination from './components/components/Pagination.vue';

import Card from './components/components/card/Card.vue';
import CardHeader from './components/components/card/CardHeader.vue';
import CardContent from './components/components/card/CardContent.vue';
import CardFooter from './components/components/card/CardFooter.vue';
import CardFooterItem from './components/components/card/CardFooterItem.vue';

import Tabs from './components/components/Tabs.vue';


import BvDatepicker from './addons/BvDatepicker.vue';
import SearchInput from './addons/SearchInput.vue';
import PanelAccordionItem from './addons/PanelAccordionItem.vue';
import SwatchesPicker from './addons/SwatchesPicker.vue';





export default {
  install(Vue, options) {

    Vue.component('Container', Container);
    Vue.component('Hero', Hero);
    Vue.component('HeroBody', HeroBody);
    Vue.component('Columns', Columns);
    Vue.component('Column', Column);
    Vue.component('Level', Level);



    Vue.component('Box', Box);
    Vue.component('Field', Field);
    Vue.component('FieldLabel', FieldLabel);
    Vue.component('FieldBody', FieldBody);
    Vue.component('Control', Control);
    Vue.component('Help', Help);
    Vue.component('Icon', Icon);
    Vue.component('Tag', Tag);
    Vue.component('BvTable', BvTable);
    Vue.component('Row', Row);
    Vue.component('BvTitle', BvTitle);
    Vue.component('FieldControl', FieldControl);
    Vue.component('Notification', Notification);



    Vue.component('Navbar', Navbar);
    Vue.component('NavbarStart', NavbarStart);
    Vue.component('NavbarEnd', NavbarEnd);
    Vue.component('NavbarItem', NavbarItem);
    Vue.component('NavbarItemDropdown', NavbarItemDropdown);
    Vue.component('NavbarDropdown', NavbarDropdown);
    Vue.component('Modal', Modal);
    Vue.component('ModalCard', ModalCard);
    Vue.component('ModalCardHead', ModalCardHead);
    Vue.component('ModalCardBody', ModalCardBody);
    Vue.component('ModalCardFoot', ModalCardFoot);
    Vue.component('Pagination', Pagination);
    Vue.component('Card', Card);
    Vue.component('CardHeader', CardHeader);
    Vue.component('CardContent', CardContent);
    Vue.component('CardFooter', CardFooter);
    Vue.component('CardFooterItem', CardFooterItem);
    Vue.component('Tabs', Tabs);



    Vue.component('BvDatepicker', BvDatepicker);
    Vue.component('SearchInput', SearchInput);
    Vue.component('PanelAccordionItem', PanelAccordionItem);
    Vue.component('SwatchesPicker', SwatchesPicker);




    }
  }
