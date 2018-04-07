(function() {
    var el=wp.element.createElement, registerBlockType=wp.blocks.registerBlockType, Editable=wp.blocks.Editable;
    createBlock=wp.blocks.createBlock;
    registerBlockType('pmpro-member-blocks/style', {
        title:'style', 
        icon:'art', 
        category:'formatting', 
        keywords:['css', 'in line'],
        attributes: {
            content: {
                source: 'text', selector: '.wp-block-inline-css-block-gutenberg-style',
            }
            ,
        }
        , supports: {
            html: !1, customClassName: !1,
        }
        , edit:function(props) {
            var content=props.attributes.content;
            function onChangeContent(newStyle) {
                props.setAttributes( {
                    content: newStyle.target.value
                }
                )
            }
            return el('textarea', {
                className: props.className, onChange: onChangeContent, value: content, placeholder: ' Your css code ....'
            }
            )
        }
        , save:function(props) {
            var content=props.attributes.content;
            return el('style', {
                dangerouslySetInnerHTML: {
                    __html: content
                }
            }
            )
        }
    }
    )
}

)()