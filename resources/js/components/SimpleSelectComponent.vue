<template>
    <select class="search" v-bind:id="identifier" v-bind:name="identifier">
        <option value = "" disabled>{{ message }}</option>
        <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>     
    </select>
</template>

<script>
    export default {
        props: ['options', 'picked', 'identifier', 'message'],
        mounted: function() {
            var elem = document.getElementById(this.identifier);
            elem.value = this.picked;
            M.FormSelect.init(elem, {});
        }
    }
</script>
