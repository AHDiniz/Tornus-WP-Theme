wp.blocks.registerBlockType('tornus/duration', {
    title: 'Duration Block',
    icon: 'clock',
    category: 'common',
    attributes: {
        start_day: {type: 'number'},
        start_month: {type: 'number'},
        start_year: {type: 'number'},
        start_hour: {type: 'number'},
        start_minute: {type: 'number'},
        end_day: {type: 'number'},
        end_month: {type: 'number'},
        end_year: {type: 'number'},
        end_hour: {type: 'number'},
        end_minute: {type: 'number'},
    },
    edit: function (props)
    {
        function updateStartDay(event)
        {
            props.setAttributes({start_day: event.target.value});
        }

        function updateStartMonth(event)
        {
            props.setAttributes({start_month: event.target.value});
        }

        function updateStartYear(event)
        {
            props.setAttributes({start_year: event.target.value});
        }

        function updateStartHour(event)
        {
            props.setAttributes({start_hour: event.target.value});
        }

        function updateStartMinute(event)
        {
            props.setAttributes({start_minute: event.target.value});
        }

        function updateEndDay(event)
        {
            props.setAttributes({end_day: event.target.value});
        }

        function updateEndMonth(event)
        {
            props.setAttributes({end_month: event.target.value});
        }

        function updateEndYear(event)
        {
            props.setAttributes({end_year: event.target.value});
        }

        function updateEndHour(event)
        {
            props.setAttributes({end_hour: event.target.value});
        }

        function updateEndMinute(event)
        {
            props.setAttributes({end_minute: event.target.value});
        }

        return wp.element.createElement("div", null, wp.element.createElement("h3", null, "Duração"), wp.element.createElement("h5", null, "Começo"), wp.element.createElement("input", {
            type: "number",
            name: "start_day",
            placeholder: "Start Day",
            value: props.attributes.start_day,
            onChange: updateStartDay
          }), wp.element.createElement("input", {
            type: "number",
            name: "start_month",
            placeholder: "Start Month",
            value: props.attributes.start_month,
            onChange: updateStartMonth
          }), wp.element.createElement("input", {
            type: "number",
            name: "start_year",
            placeholder: "Start Year",
            value: props.attributes.start_year,
            onChange: updateStartYear
          }), wp.element.createElement("input", {
            type: "number",
            name: "start_hour",
            placeholder: "Start Hour",
            value: props.attributes.start_hour,
            onChange: updateStartHour
          }), wp.element.createElement("input", {
            type: "number",
            name: "start_minute",
            placeholder: "Start Minute",
            value: props.attributes.start_minute,
            onChange: updateStartMinute
          }), wp.element.createElement("h5", null, "Final"), wp.element.createElement("input", {
            type: "number",
            name: "end_day",
            placeholder: "End Day",
            value: props.attributes.end_day,
            onChange: updateEndDay
          }), wp.element.createElement("input", {
            type: "number",
            name: "end_month",
            placeholder: "End Month",
            value: props.attributes.end_month,
            onChange: updateEndMonth
          }), wp.element.createElement("input", {
            type: "number",
            name: "end_year",
            placeholder: "End Year",
            value: props.attributes.end_year,
            onChange: updateEndYear
          }), wp.element.createElement("input", {
            type: "number",
            name: "end_hour",
            placeholder: "End Hour",
            value: props.attributes.end_hour,
            onChange: updateEndHour
          }), wp.element.createElement("input", {
            type: "number",
            name: "end_minute",
            placeholder: "End Minute",
            value: props.attributes.end_minute,
            onChange: updateEndMinute
          }));
    },
    save: function (props)
    {
        return wp.element.createElement("div", null, wp.element.createElement("p", null, "Começo: ", props.attributes.start_day, "/", props.attributes.start_month, "/", props.attributes.start_year, " ", props.attributes.start_hour, ":", props.attributes.start_minute), wp.element.createElement("p", null, "Final: ", props.attributes.end_day, "/", props.attributes.end_month, "/", props.attributes.end_year, " ", props.attributes.end_hour, ":", props.attributes.end_minute));
    }
});