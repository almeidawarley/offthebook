<template>
    <div>
        <div class="row">
            <span v-for="(letter, index) in phrase" v-html="getLetter(index)"></span>
        </div>
        <div class="row">
            <span v-for="(letter, index) in phrase" @click="openInput(index)" v-bind:style="getPadding(index)" class="span-chord" >{{letter}}</span>
        </div>
        <div v-if="show">
            <select class="small-select browser-default" @keydown.enter="addChord()" v-model="selectValue" v-focus>
                <option value="-1">None</option>
                <option v-for="(chord, index) in chords" v-bind:value="index">{{ chord }}</option>
            </select>
            <a class="btn"  @click="addChord()"><i class="material-icons">add</i></a>
            <a class="btn red"  @click="hideInput()"><i class="material-icons">remove</i></a>
        </div>
        <input type="text" v-for="(choice, index) in choices" v-bind:value="choice" v-bind:name="identifier + 'at' + index" hidden/>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                // True if select input should appear, false otherwise
                show: false,
                // Store the index of the last selected letter
                lastIndex: -1,
                // Store the select value of the select input
                selectValue: -1
            }
        },
        props: [
            // Store selected choices for each position of the line
            'choices', 
            // Store the line's content
            'phrase',
            // Store the line's ID
            'identifier', 
            // Store potential options for chords
            'chords'
        ],
        methods : {
            /**
             * Save the current index, show select object, and choose the right option
             */
            openInput : function(index){
                this.show = true;
                this.lastIndex = index;
                this.selectValue = this.getSelected(index);
            },
            /**
             * Hide input select and set select value to its standard value
             */
            hideInput : function(){
                this.selectValue = -1;
                this.show = false;
            },
            /**
             * Update the selected chord for a position accordingly and hide select
             */
            addChord : function(){
                if(this.selectValue == -1){
                    delete this.choices[this.lastIndex];
                }else{
                    this.choices[this.lastIndex] = this.selectValue;
                }
                this.hideInput();
            },
            /**
             * Retrieve a padding value for a span given the size of the chord's name
             */
            getPadding : function(index){
                var padding = 0;
                var choice = this.choices[index];
                if(this.isDefined(choice)){
                    padding = 10 * (this.getLetter(index).length - 1);
                }
                return 'padding-right:' + padding  + 'px';
            },
            /**
             * Retrieve selected chord for a given position
             */
            getSelected : function(index){
                var choice = this.choices[index];
                if(!this.isDefined(choice)){
                    choice = -1;
                }
                return choice;
            },
            /**
             * Retrieve the name of the chord selected for a given position (in raw HTML)
             */
            getLetter : function(index){    
                var choice = this.choices[index];
                if(this.isDefined(choice)){
                    return this.chords[choice];
                }else{
                    return '&nbsp;';
                }
            },
            /**
             * Return true if a given element is defined, false if undefined
             */
            isDefined : function(element){
                return typeof element !== 'undefined';
            }

        }
    }
</script>
