<style scoped xmlns="http://www.w3.org/1999/html">
</style>

<template>
    <div class="panel panel-default ng-isolate-scope" heading="{{ item.name }}">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="" class="accordion-toggle" ng-click="toggleOpen()" accordion-transclude="heading"><span ng-class="{'text-muted': isDisabled}" class="ng-binding">{{ item.name }}</span></a>
            </h4>
        </div>
        <div class="panel-collapse collapse in" collapse="!isOpen" style="height: auto;">
            <div class="panel-body" ng-transclude="">
                <p class="ng-scope">{{ item.description }}</p>
                <button class="btn btn-default btn-sm ng-scope" ng-click="addItem()">增加权限</button>
                <div class="list-group m-t ng-scope">
                    <!-- ngRepeat: item in items -->
                    <div ng-repeat="pitem in item.permissions" class="list-group-item ng-binding ng-scope">
                        {{ pitem.display_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['item'],
        data(){
            return {
//                msg: 'hello vue'
            }
        },
        computed: {
            userId(){
                return this.item.user_id;
            },
            link(){
                return "/users/" + this.userId + "#/user/" + this.userId + "/profile";
            },
        },
        watch: {},
        events: {},
        methods: {

        },
    }
</script>