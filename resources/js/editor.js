import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Image from "@editorjs/image";
import Quote from "@editorjs/quote";
import Embed from "@editorjs/embed";

const editor = new EditorJS({
    holder: "editorjs",
    tools: {
        header: {
            class: Header,
            inlineToolbar: true,
        },
        list: {
            class: List,
            inlineToolbar: true,
        },
        image: {
            class: Image,
        },
        quote: {
            class: Quote,
            inlineToolbar: true,
            shortcut: "CMD+SHIFT+O",
            config: {
                quotePlaceholder: "Enter a quote",
                captionPlaceholder: "Quote's author",
            },
        },
        embed: {
            class: Embed,
            config: {
                services: {
                    youtube: true,
                    twitter: true,
                    instagram: true,
                    facebook: true,
                },
            },
        },
    },
});
