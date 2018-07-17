Vue.component('create-topic', {

    /**
     * The component's data.
     */
    data() {
        return {
            form: new SparkForm({
                name: '',
            }),
        };
    },
    
    events: {
        /**
         * Handle the "activatedTab" event.
         */
        activatedTab(tab) {
            if (tab === 'topics') {
                Vue.nextTick(() => {
                    $('#create-topic-name').focus();
                });
            }

            return true;
        }
    },

    ready() {
        
        $("[name=query]").select2({
            theme: 'bootstrap',
            tags: true,
            tokenSeparators: [','],
            ajax: {
                url: "/content/search",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        query: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    params.page = params.page || 1;

                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.email,
                                text: item.name + " (" + item.email + ")"
                            }
                        }),
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 1

        });
    },

    methods: {
        /**
         * Create a new topic.
         */
        create() {
            Spark.post('/content', this.form)
                .then(() => {
                    this.form.name = '';

                    this.$dispatch('updateTopics');
                });

        }
    }
});
