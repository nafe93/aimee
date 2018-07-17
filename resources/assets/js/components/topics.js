Vue.component('topics', {
    props: ['user'],

    /**
     * The component's data.
     */
    data() {
        return {
            topics: []
        }
    },

    /**
     * The component has been created by Vue.
     */
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
         * Remove (unsubscribe from) the given topic.
         */
        remove(topic) {
            this.$http.post(`/content/${topic.id}/`)
                .then(() => {
                    this.getTopics();
                });

            this.removeTopic(topic);
        },


        /**
         * Remove the given topic from the list.
         */
        removeTopic(topic) {
            this.topics = _.reject(this.topics, i => i.id === topic.id);
        }

    },
    
    computed: {
        /**
         * Get the URL for removing (unsubscribing from) a topic.
         */
        urlForLeaving() {
            return `/content/${this.deletingTopic.id}/members/${this.user.id}`;
        }
    }
});
