<template>
    <select v-bind:id="identifier" v-bind:name="identifier + '[]'" multiple>
        <option value = "" disabled>{{ message }}</option>
        <option v-for="option in options" v-bind:value="option.id">{{ option.name }}</option>     
    </select>
</template>

<script>
    export default {
        props: ['options', 'picked', 'identifier', 'message'],
        mounted: function() {
            var elem = document.getElementById(this.identifier);
            for(var i = 0; i < elem.options.length; i++){
                elem.options[i].selected = this.picked.indexOf(Number(elem.options[i].value)) >= 0;
            }
            M.FormSelect.init(elem, {});
        }
    }
</script>
