<template>
    <div>
        <div class="row">
            <span v-for="(letter, index) in letters" v-html="getLetter(index)"></span>
        </div>
        <div class="row">
            <span class="span-chord" v-for="(letter, index) in letters" @click="openInput(index)" v-bind:style="getPadding(index)">{{letter}}</span>
        </div>
        <div v-if="show">
            <select id="chord" class="browser-default" @change="addChord()"  v-model="inputValue" style="width:150px;display:inline;" v-focus>
                <option value="-1">None</option>
                <option v-for="(option, index) in options" v-bind:value="index">{{ option.name }}</option>
            </select>
            <button class="btn"  @click="addChord()"><i class="material-icons">add</i></button>
            <button class="btn red"  @click="hideInput()"><i class="material-icons">remove</i></button>
        </div>

        <input type="text" v-for="(chord, index) in chords" v-bind:value="options[chord].id" v-bind:name="identifier + 'at' + index" hidden/>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                chords: {},
                show: false,
                lastIndex: -1,
                inputValue: -1
            }
        },
        props: ['letters', 'identifier', 'options'],
        mounted: function() {
            console.log('Elemento montado!');
        },
        methods : {
            openInput : function(index){
                this.show = true;
                this.lastIndex = index;
                this.inputValue = this.getSelected(index);
            },
            hideInput : function(){
                this.inputValue = -1;
                this.show = false;
            },
            addChord : function(){
                if(this.inputValue == -1){
                    delete this.chords[this.lastIndex];
                }else{
                    this.chords[this.lastIndex] = this.inputValue;
                }
                this.hideInput();
            },
            getPadding : function(index){
                var padding = 0;
                if(this.isDefined(this.chords[index])){
                    padding = 10 * (this.getLetter(index).length - 1);
                }
                return 'padding-right:' + padding  + 'px';
            },
            getSelected : function(index){
                if(this.isDefined(this.chords[index])){
                    return this.chords[index];
                }else{
                    return this.inputValue;
                }
            }, 
            getLetter : function(index){
                if(this.isDefined(this.chords[index])){
                    return this.options[this.chords[index]].name;
                }else{
                    return '&nbsp;';
                }
            },
            isDefined : function(element){
                return typeof element !== 'undefined';
            }

        }
    }
</script>
