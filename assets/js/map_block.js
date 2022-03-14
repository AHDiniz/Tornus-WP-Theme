wp.blocks.registerBlockType('tornus/map-block', {
    title: 'Map Block',
    icon: 'location-alt',
    category: 'common',
    attributes: {
        street: { type: 'string' },
        number: { type: 'number' },
        city: { type: 'string' },
        country: { type: 'string' },
        code: { type: 'number' }
    },
    edit: function (props)
    {
        function updateContent(event)
        {
            props.setAttributes({content: event.target.value});
        };

        return wp.element.createElement("div", null, wp.element.createElement("h3", null, "Mapa"), wp.element.createElement("input", {
            type: "text",
            name: "street-name",
            placeholder: "Rua",
            value: props.attributes.content,
            onChange: updateContent
        }), wp.element.createElement("input", {
            type: "number",
            name: "address-number",
            placeholder: "Número",
            value: props.attributes.content,
            onChange: updateContent
        }), wp.element.createElement("input", {
            type: "text",
            name: "city-name",
            placeholder: "Cidade",
            value: props.attributes.content,
            onChange: updateContent
        }), wp.element.createElement("input", {
            type: "text",
            name: "country-name",
            placeholder: "País",
            value: props.attributes.content,
            onChange: updateContent
        }), wp.element.createElement("input", {
            type: "number",
            name: "address-code",
            placeholder: "CEP",
            value: props.attributes.content,
            onChange: updateContent
        }));
    },
    save: function (props)
    {
        return null;
    }
});