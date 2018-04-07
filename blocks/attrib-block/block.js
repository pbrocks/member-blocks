/**
 * RichText Block
 *
 * https://github.com/modularwp/gutenberg-block-editable-example
 */
( function() {
	var __                = wp.i18n.__; // The __() function for internationalization.
	var createElement     = wp.element.createElement; // The wp.element.createElement() function to create elements.
	var registerBlockType = wp.blocks.registerBlockType; // The registerBlockType() function to register blocks.
	var RichText          = wp.blocks.RichText; // For creating editable elements.

	/**
	 * Register block
	 *
	 * @param  {string}   name     Block name.
	 * @param  {Object}   settings Block settings.
	 * @return {?WPBlock}          Block itself, if registered successfully,
	 *                             otherwise "undefined".
	 */
	registerBlockType(
		'pmb/attrib-block', // Block name. Must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
		{
			title: __( 'PMB Attributes' ), // Block title. __() function allows for internationalization.
			icon: 'editor-indent', // Block icon from Dashicons. https://developer.wordpress.org/resource/dashicons/.
			category: 'common', // Block category. Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
			attributes: {
				    title: {
				        type: 'array',
				        source: 'children',
				        selector: 'h2',
				    },
				    mediaID: {
				        type: 'number',
				    },
				    mediaURL: {
				        type: 'string',
				        source: 'attribute',
				        selector: 'img',
				        attribute: 'src',
				    },
				    body: {
				        type: 'array',
				        source: 'children',
				        selector: '.callout-body',
				    },
				    alignment: {
				        type: 'string',
				    },
					// content: {
					// 	type: 'string',
					// 	placeholder: 'You can edit me ...',
					// },
			},

			// Defines the block within the editor.
			// edit: function( props ) {
			// 	var content = props.attributes.content;
			// 	var focus = props.focus;

			// 	function onChangeContent( updatedContent ) {
			// 		props.setAttributes( { content: updatedContent } );
			// 	}

			// 	return createElement(
			// 		RichText,
			// 		{
			// 			tagName: 'p',
			// 			className: props.className,
			// 			value: content,
			// 			onChange: onChangeContent,
			// 			focus: focus,
			// 			onFocus: props.setFocus
			// 		},
			// 	);
			// },

			
			edit: ( { attributes, className, isSelected, setAttributes } ) => {
			    const { mediaID, mediaURL, body, alignment, title } = attributes;

			    const onChangeTitle = value => {
			        setAttributes( { title: value } );
			    };

			    const onSelectImage = media => {
			        setAttributes( {
			            mediaURL: media.url,
			            mediaID: media.id,
			        } );
			    };

			    const onChangeBody = value => {
			        setAttributes( { body: value } );
			    };

			    const [ imageClasses, textClasses, wrapClass ] = sortOutCSSClasses( alignment, className );

			    return [
			        isSelected && (
			            <BlockControls key="controls">
			                <AlignmentToolbar
			                    value={alignment}
			                    onChange={( nextAlign ) => {
			                        setAttributes( { alignment: nextAlign } );
			                    }}
			                />
			            </BlockControls>
			        ),
			        <div className={wrapClass} key="container">
			            <div className={imageClasses}>
			                <div className="callout-image">
			                    <MediaUpload
			                        onSelect={onSelectImage}
			                        type="image"
			                        value={mediaID}
			                        render={( { open } ) => (
			                            <Button className={mediaID ? 'image-button' : 'button button-large'} onClick={open}>
			                                {!mediaID ? __( 'Upload Image' ) : <img src={mediaURL} />}
			                            </Button>
			                        )}
			                    />
			                </div>
			            </div>
			            <div className={textClasses}>
			                <RichText
			                    tagName="h2"
			                    placeholder={__( 'Write a callout title…' )}
			                    value={title}
			                    onChange={onChangeTitle}
			                />
			                <RichText
			                    tagName="div"
			                    multiline="p"
			                    className="callout-body"
			                    placeholder={__( 'Write the callout body' )}
			                    value={body}
			                    onChange={onChangeBody}
			                />
			            </div>
			        </div>
			    ];
			},
			// Defines the saved block.
			// save: function( props ) {
			// 	var content = props.attributes.content;

			// 	return createElement(
			// 		'p',
			// 		{
			// 			className: props.className,
			// 		},
			// 		content
			// 	);
			// },
			save: props => {
		        const {
		            className,
		            attributes: {
		                title,
		                mediaURL,
		                body,
		                alignment
		            }
		        } = props;

		    const [ imageClasses, textClasses, wrapClass ] = sortOutCSSClasses( alignment, className );

		    return (
		        <div className="bootstrap-block">
		            <div className={wrapClass}>
		                // <div className={imageClasses}>
		                //     {
		                //         mediaURL && (
		                //             <img className="recipe-image" src={mediaURL} />
		                //         )
		                //     }
		                // </div>
		                // <div className={textClasses}>
		                //     <h2>
		                //         {title}
		                //     </h2>
		                //     <div className="callout-body">
		                //         {body}
		                //     </div>
		                // </div>
		            </div>
		        </div>
		    );
		}
	// );
})();
