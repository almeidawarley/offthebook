<template>
    <div v-bind:id="identifier">
        <div class="row">
            <span v-for="(letter, index) in letters" v-html="getLetter(index, true)"></span>
        </div>
        <div class="row">
            <span class="span-chord" v-for="(letter, index) in letters" @click="openInput(index)" v-bind:style="getPadding(index)">{{letter}}</span>
        </div>
        <div v-if="show">
            <input @keyup.enter="addChord()" id="chord" type="text" style="width:auto;" size="1" v-bind:value="getLetter(last_index, false)" v-focus/>
            <button class="btn"  @click="addChord()"><i class="material-icons">add</i></button>
            <button class="btn red"  @click="hideInput()"><i class="material-icons">remove</i></button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                chords: {},
                show: false,
                last_index: -1
            }
        },
        props: ['letters', 'identifier', 'options'],
        mounted: function() {
            console.log('Elemento montado!');
        },
        methods : {
            openInput : function(index){
                var input_field = document.getElementById('chord');
                this.show = true;
                this.last_index = index;
            },
            hideInput : function(){
                this.show = false;
            },
            addChord : function(){
                var input_field = document.getElementById('chord');
                this.chords[this.last_index] = input_field.value;
                input_field.value = "";
                console.log(this.chords);
                this.hideInput();
            },
            getPadding : function(index){
                var padding = 0;
                if(this.chords[index]){
                    padding = 10 * this.chords[index].length;
                }
                return 'padding-right:' + padding  + 'px';
            },            
            getLetter : function(index, raw){
                if(this.chords[index]){
                    return this.chords[index];
                }else{
                    if(raw){
                        return '&nbsp;';
                    }else{
                        return '';
                    }
                }
            }

        }
    }
</script>
