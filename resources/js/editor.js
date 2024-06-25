import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Image from "@editorjs/image";
import Quote from "@editorjs/quote";
import Embed from "@editorjs/embed";

document.addEventListener("alpine:init", () => {
    console.log("here");
    Alpine.data("editorjs", (data = {}, readOnly = false) => ({
        editorjs: null,
        data,
        readOnly,
        beforeSend() {
            this.editorjs
                .save()
                .then((outputData) => {
                    document.getElementById("description").value = outputData
                        .blocks.length
                        ? JSON.stringify(outputData)
                        : "";
                    document.getElementById("post-form").submit();
                })
                .catch((error) => {
                    console.log("Saving failed: ", error);
                });
        },
        init() {
            console.log("here");
            this.editorjs = new EditorJS({
                holder: "editorjs",
                data,
                readOnly,
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
                        config: {
                            endpoints: {
                                byFile: "/dashboard/media/upload",
                            },
                            additionalRequestData: {
                                _token: document.querySelector(
                                    'meta[name="csrf"]'
                                )?.content,
                            },
                        },
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
        },
    }));
});
