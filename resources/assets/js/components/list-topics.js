Vue.component('list-topics', {
    props: ['user', 'topics'],

    data() {
        return {
            unsubscribing: null,
            unsubscribeForm: new SparkForm({}),
        }
    },
    
    created() {
        this.getTopics();
    },

    events: {
        /**
         * Update the topics.
         */
        updateTopics() {
            this.getTopics();
        }
    },

    /**
     * Prepare the component.
     */
    ready() {
        $('[data-toggle="tooltip"]').tooltip();
    },
    
    methods: {
        /**
         * Get the topics for the user.
         */
        getTopics() {
            this.$http.get('/content/index')
                .then(response => {
                    this.topics = response.data;
                });
        },

        /**
         * Approve unsubscribing from the topic.
         */
        approveUnsubscribe(topic) {
            this.unsubscribing = topic;

            $('#modal-unsubscribe').modal('show');
        },


        /**
         * Unsubscribe from the given topic.
         */
        unsubscribe() {
            Spark.delete(this.unsubscribeUrl, this.unsubscribeForm)
                .then(() => {
                    this.getTopics();

                    $('#modal-unsubscribe').modal('hide');
                });
        },

    },

    computed: {
        /**
         * Get the URL for unsubscribing from a topic.
         */
        unsubscribeUrl() {
            return `/content/${this.unsubscribing.id}`;
        }
    }
});
