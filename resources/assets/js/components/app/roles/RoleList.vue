<style scoped>
</style>

<template>

    <div class="wrapper-md">

        <h1>{{ $t('user.users') }}</h1>
        <hr>

        <div class="row">
            <div class="col-lg-6">
                <!-- accordion -->
                <div ng-controller="AccordionDemoCtrl" class="ng-scope">
                    <accordion close-others="oneAtATime">
                        <div class="panel-group" ng-transclude="">
                            <template v-for="item of items">
                                <div class="col-md-12 m-b-sm">
                                    <sl-role-list-item :item="item"></sl-role-list-item>
                                </div>
                            </template>
                        </div>
                    </accordion>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
    export default{
        props: [],
        data(){
            return {
//                msg: 'hello vue',
                items: [],
            }
        },
        computed: {},
        components: {
            'sl-role-list-item': require('./RoleListGroupItem.vue'),
        },
        mounted(){
            console.log('Component Ready.');

            this.fetchData();
        },
        watch: {},
        events: {},
        methods: {
            fetchData(){

                this.$api.get('/roles', {
                    params: {
//                        include: ''
                    }
                })
                    .then((response => {
                        console.log(response);
                        this.items = response.data.data;
                    }).bind(this))
                    .catch((error => {
                        console.error(error);
                    }).bind(this));

            }
        },
    }
</script>