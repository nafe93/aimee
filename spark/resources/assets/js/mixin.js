module.exports = {
    computed: {
        /**
         * Get the billable entity.
         */
        billable() {
            if (this.billableType) {
                return this.billableType == 'user' ? this.user : this.team;
            } else {
                return this.user;
            }
        },


        /**
         * Determine if the current billable entity is a user.
         */
        billingUser() {
            // uncomment to enable team billing
            // return this.billableType && this.billableType == 'user';
            return true;
        },


        /**
         * Access the global Spark object.
         */
        spark() {
            return window.Spark;
        }
    }
};
