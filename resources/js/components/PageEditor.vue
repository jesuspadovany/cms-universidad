<template>
  <div>
    <ckeditor
      :editor="editorState.editor"
      :config="editorState.editorConfig"
      v-model="editorState.editorData"
    ></ckeditor>

    <textarea
      class="hidden"
      :name="name"
      :value="editorState.editorData"
      ></textarea>
  </div>
</template>

<script>
import { ref, reactive } from "@vue/composition-api";
import ClassicEditor from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';

import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import UploadAdapterPlugin from '@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter';
import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import BlockQuotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import EasyImagePlugin from '@ckeditor/ckeditor5-easy-image/src/easyimage';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import ImagePlugin from '@ckeditor/ckeditor5-image/src/image';
import ImageCaptionPlugin from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageStylePlugin from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageToolbarPlugin from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageUploadPlugin from '@ckeditor/ckeditor5-image/src/imageupload';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import FontColor from '@ckeditor/ckeditor5-font/src/fontcolor';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize';
import HorizontalLine from '@ckeditor/ckeditor5-horizontal-line/src/horizontalline';

const config = {
  language: 'es',
  fontSize: {
    options: [
      9,
      11,
      12,
      13,
      14,
      15,
      'default',
      17,
      18,
      19,
      20,
    ]
  },
  fontColor: {
    colors: [
      {
        color: 'hsl(0, 0%, 0%)',
        label: 'Negro'
      },
      {
        color: 'hsl(0, 0%, 30%)',
        label: 'Gris tenue'
      },
      {
        color: 'hsl(0, 0%, 60%)',
        label: 'Gris'
      },
      {
        color: 'hsl(0, 0%, 90%)',
        label: 'Gris claro'
      },
      {
        color: 'hsl(0, 0%, 100%)',
        label: 'Blanco',
        hasBorder: true
      },
      {
        color: 'hsl(350, 77%, 50%)',
        label: 'Primario'
      },
      {
        color: 'hsl(350, 100%, 61%)',
        label: 'Primario claro'
      },
      {
        color: 'hsl(350, 92%, 42%)',
        label: 'Primario oscuro'
      },
      {
        color: 'hsl(207, 73%, 57%)',
        label: 'Azul'
      },
    ]
  },
  plugins: [
    EssentialsPlugin,
    UploadAdapterPlugin,
    AutoformatPlugin,
    BoldPlugin,
    ItalicPlugin,
    BlockQuotePlugin,
    EasyImagePlugin,
    HeadingPlugin,
    ImagePlugin,
    ImageCaptionPlugin,
    ImageStylePlugin,
    ImageToolbarPlugin,
    ImageUploadPlugin,
    LinkPlugin,
    ListPlugin,
    ParagraphPlugin,
    FontColor,
    FontSize,
    HorizontalLine,
  ],
  toolbar: {
    items: [
      'heading',
      '|',
      'fontColor',
      'fontSize',
      'bold',
      'italic',
      '|',
      'link',
      'bulletedList',
      'numberedList',
      //'imageUpload',
      'blockQuote',
      'horizontalLine',
      '|',
      'undo',
      'redo',
    ]
  },
  // image: {
  //   toolbar: [
  //     'imageStyle:full',
  //     'imageStyle:side',
  //     '|',
  //     'imageTextAlternative'
  //   ]
  // },
};

export default {
  name: 'page-editor',
  props: {
    page: {
      type: Object,
      required: true
    },
    name: {
      type: String,
      default: ''
    }
  },
  setup(props) {
    const editorState = reactive({
      editor: ClassicEditor,
      editorData: props.page.content,
      editorConfig: config
    });

    return {
      editorState
    };
  }
}
</script>
