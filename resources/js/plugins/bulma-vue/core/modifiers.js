export default class Modifiers {
  constructor() {

    this.modifiersList={
      //Main Colors
      'primary': 'is-primary',
      'link': 'is-link',
      'info': 'is-info',
      'success': 'is-success',
      'warning': 'is-warning',
      'danger': 'is-danger',







      //Typography
      'textleft': 'has-text-left',
      'textcentered': 'has-text-centered',
      'textright': 'has-text-right',
      'normal': 'is-normal',
      'small': 'is-small',
      'large': 'is-large',



      'textwhite': 'has-text-white',
      'textblack': 'has-text-black',
      'textlight': 'has-text-light',
      'textdark': 'has-text-dark',
      'textprimary': 'has-text-primary',
      'textinfo': 'has-text-info',
      'textlink': 'has-text-link',
      'textsuccess': 'has-text-success',
      'textwarning': 'has-text-warning',
      'textdanger': 'has-text-danger',
      'textblackbis': 'has-text-black-bis',
      'textblackter': 'has-text-black-ter',
      'textgreydarker': 'has-text-grey-darker',
      'textgreydark': 'has-text-grey-dark',
      'textgrey': 'has-text-grey',
      'textgreylight': 'has-text-grey-light',
      'textgreylighter': 'has-text-grey-lighter',
      'textwhiteter': 'has-text-white-ter',
      'textwhitebis': 'has-text-white-bis',


      'backgroundwhite': 'has-background-white',
      'backgroundblack': 'has-background-black',
      'backgroundlight': 'has-background-light',
      'backgrounddark': 'has-background-dark',
      'backgroundprimary': 'has-background-primary',
      'backgroundinfo': 'has-background-info',
      'backgroundlink': 'has-background-link',
      'backgroundsuccess': 'has-background-success',
      'backgroundwarning': 'has-background-warning',
      'backgrounddanger': 'has-background-danger',
      'backgroundblackbis': 'has-background-black-bis',
      'backgroundblackter': 'has-background-black-ter' ,
      'backgroundgreydarker': 'has-background-grey-darker' ,
      'backgroundgreydark': 'has-background-grey-dark',
      'backgroundgrey': 'has-background-grey',
      'backgroundgreylight': 'has-background-grey-light',
      'backgroundgreylighter': 'has-background-grey-lighter',
      'backgroundwhiteter': 'has-background-white-ter',
      'backgroundwhitebis': 'has-background-white-bis',


      'clearfix': 'is-clearfix',
      'pulledleft': 'is-pulled-left',
      'pulledright': 'is-pulled-right',

      'marginless': 'is-marginless',
      'paddingless': 'is-paddingless',

      'overlay': 'is-overlay',
      'clipped': 'is-clipped',
      'radiusless': 'is-radiusless',
      'shadowless': 'is-shadowless',
      'unselectable': 'is-unselectable',
      'invisible': 'is-invisible',
      'sronly': 'is-sr-only',


      'shadow': 'has-shadow',
      'horizontal': 'is-horizontal',
      'narrow': 'is-narrow',
      'left': 'is-left',
      'right': 'is-right',
      'centered': 'is-centered',
      'multiple': 'is-multiple',
    };

    this.modifiers= new Array;
  }

  check(props){

    for (let index in this.modifiersList){
      if (props[index]) {
        this.modifiers.push(this.modifiersList[index]);

      }
    }
  }



  get(){

    return this.modifiers.join(" ");

  }

}
