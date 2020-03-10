<template>
    <div class="row">
        <div class="input-field col s6 offset-s3">
            <i class="material-icons prefix">music_note</i>
            <input @change="updateList()" type="text" id="autocomplete-input" class="autocomplete" />
            <label for="autocomplete-input">Please select the songs for the listing</label>
        </div>
        <div v-if="choices.length > 0" class="col s8 offset-s2">
            <ul class="collection">
                <li class="collection-item" v-for="(choice, index) in choices">{{ songs[choice].name }} in key 
                    <select class="browser-default small-select" v-model="modifications[index]">
                        <option v-for="(key, index) in keys" v-bind:value="index"> {{key}} </option>                
                    </select>
                    <a @click="removeItem(index)" class="secondary-content" style="cursor:pointer;"><i class="material-icons prefix">remove</i></a>
                </li>
            </ul>
        </div>
        <!-- Add input list -->

        <input v-for="(choice, index) in choices" v-bind:name="'song'+index" v-bind:value="songs[choice].id"  hidden/>
        <input v-for="(choice, index) in choices" v-bind:name="'key'+index" v-bind:value="modifications[index]"  hidden/>
        <input name="songs" v-bind:value="choices.length" hidden/>
    </div>
</template>

<script>
    export default {
        data : function(){
            return {
                'instance': null,
                'options': {},
                'mapping': {},
                'choices': [],
                'modifications': []
            };
        },        
        props: ['songs', 'keys', 'ichoices'],
        mounted: function() {
            var elem = document.getElementById('autocomplete-input');
            this.instance = M.Autocomplete.init(elem, {
                'onAutocomplete': this.updateList
            });
            
            var component = this;
            this.songs.forEach(function(element, index){
                var option_name = '#' + element.id + ' ' + element.name;
                component.options[option_name] = '';
                component.mapping[option_name] = index;
            });

            // Update choices with initial choices received from outside
            this.ichoices.forEach(function(element){
                component.choices.push(element);
            });
            console.log('initial choices: ' + this.ichoices);
            console.log('actual choices: ' + this.choices);
            console.log('songs');
            console.log(this.songs);

            this.choices.forEach(function(choice){
                component.modifications.push(component.songs[choice].chord_id);
            });
            console.log('personalized keys: ' + this.modifications);

            
            this.instance.updateData(this.options);

        },
        methods: {
            updateList: function(value, a, b){
                var choice = this.mapping[value];
                if(choice != null && !this.choices.includes(choice)){
                    this.choices.push(choice);
                    this.modifications.push(this.songs[choice].chord_id);
                }
            },
            removeItem: function(index){
                this.choices.splice(index, 1);
            }
        }
    }
</script>
