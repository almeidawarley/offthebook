<template>
    <div>
        <p class = "center-align">Resources</p>
        <div v-for="(r,i) in registers" class="row align-center">
            <div class="input-field col s12 m3 offset-m1">
                <i class="material-icons prefix">link</i>
                <input :disabled="!r.new" v-bind:id="'path' + i" v-bind:name="'path' + i" type="text" v-model="r.path"  value= " " />
                <label v-bind:for="'path' + i">Path</label>
            </div>
            <div class="input-field col s12 m3">
                <i class="material-icons prefix">description</i>
                <input :disabled="!r.new" v-bind:id="'description' + i" v-bind:name="'description' + i" type="text" v-model="r.description"  value= " " />
                <label v-bind:for="'description' + i">Description</label>
            </div>
            <div class="input-field col s12 m3">
                <i class="material-icons prefix">extension</i>
                <input :disabled="!r.new" v-bind:id="'format' + i" v-bind:name="'format' + i" type="text" v-model="r.format" value= " " />
                <label v-bind:for="'format' + i">Format</label>
            </div>

            <input style="opacity:1;" type="checkbox" v-bind:name="'new' + i" v-model="r.new" hidden />
            <input type="number" v-bind:name="'id' + i" v-model="r.id" hidden />

            <div class="input-field col s12 m1">
                <a v-if="!r.new" class="waves-effect waves-light btn" @click="r.new = true; $set(registers, i, r)"><i class="material-icons ">edit</i></a>
                <a class="waves-effect waves-light btn" @click="registers.splice(i, 1)"><i class="material-icons ">remove</i></a>
            </div>
        </div>
        <input name="resources" v-model="registers.length" hidden/>
        <div class = "row center-align">
            <a class="waves-effect waves-light btn" @click="registers.push({'id': -1, 'path' : '', 'description' : '', 'format' : '', 'new': true})">
                <i class="material-icons ">add</i>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                registers : []
            }
        },
        props: ['resources'],
        mounted: function() {
            if(this.resources){
                this.registers = this.resources;
                this.registers.forEach(function(element, index){
                    element['new'] = false;
                    $set(registers, index, element);
                });
            }
            console.log('Elemento montado!');
        }, 
        updated: function(){
            M.updateTextFields();
        }
    }
</script>
