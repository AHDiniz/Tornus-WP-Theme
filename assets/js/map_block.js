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
        function updateStreet(event)
        {
            props.setAttributes({street: event.target.value});
        }

        function updateNumber(event)
        {
            props.setAttributes({number: event.target.value});
        }

        function updateCity(event)
        {
            props.setAttributes({city: event.target.value});
        }

        function updateCountry(event)
        {
            props.setAttributes({country: event.target.value});
        }

        function updateCode(event)
        {
            props.setAttributes({code: event.target.value});
        }

        return wp.element.createElement("div", null, wp.element.createElement("h3", null, "Mapa"), wp.element.createElement("input", {
            type: "text",
            name: "street-name",
            placeholder: "Rua",
            value: props.attributes.street,
            onChange: updateStreet
        }), wp.element.createElement("input", {
            type: "number",
            name: "address-number",
            placeholder: "Número",
            value: props.attributes.number,
            onChange: updateNumber
        }), wp.element.createElement("input", {
            type: "text",
            name: "city-name",
            placeholder: "Cidade",
            value: props.attributes.city,
            onChange: updateCity
        }), wp.element.createElement("input", {
            type: "text",
            name: "country-name",
            placeholder: "País",
            value: props.attributes.country,
            onChange: updateCountry
        }), wp.element.createElement("input", {
            type: "number",
            name: "address-code",
            placeholder: "CEP",
            value: props.attributes.code,
            onChange: updateCode
        }));
    },
    save: function (props)
    {
        return wp.element.createElement("div", null, wp.element.createElement("p", {
            id: "street-name"
          }, props.attributes.street), wp.element.createElement("p", {
            id: "address-number"
          }, props.attributes.number), wp.element.createElement("p", {
            id: "city-name"
          }, props.attributes.city), wp.element.createElement("p", {
            id: "country-name"
          }, props.attributes.country), wp.element.createElement("p", {
            id: "address-code"
          }, props.attributes.code));
    }
});