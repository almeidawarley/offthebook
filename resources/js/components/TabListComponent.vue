<template>
    <ul id="list-tab" class="tabs">
        <li v-for="(tab, index) in tabs" v-bind:class="{'tab col s4': true, disabled : index > 0, active : index == 0}">
            <a v-bind:href="'#' + tab.id">{{tab.label}}</a>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['tabs'],
        mounted: function() {
            var elem = document.getElementById('list-tab');
            M.Tabs.init(elem, {});
        }
    }
</script>
