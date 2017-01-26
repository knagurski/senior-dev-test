<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Activities</div>

                    <div class="panel-body" v-if="!activities.length">
                        <p>It doesn't look like you have any activities. Bummer 😢.
                            Use the API to create some.</p>
                    </div>

                    <table class="table" v-else>
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Date Created</th>
                                <th>Date Updated</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="activity in activities">
                                <td>{{ activity.subject }}</td>
                                <td>{{ activity.created_at }}</td>
                                <td>{{ activity.updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.populateActivities();
        },
        data() {
          return {activities: []};
        },
        methods: {
          populateActivities() {
            this.$http.get('/api/activities')
              .then((response) => {
                this.$data.activities = response.body;
              });
          }
        }
    }
</script>
