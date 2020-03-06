<template>
    <div class="row">
        <div class="input-field col s12">
            <i class="material-icons prefix">music_note</i>
            <input @change="foo()" type="text" id="autocomplete-input" class="autocomplete" />
            <label for="autocomplete-input">Please select the songs for the listing</label>
        </div>
        <div v-if="choices.length > 0" class="col s12">
            <ul class="collection">
                <li class="collection-item" v-for="(choice, index) in choices">{{ songs[choice].name }} in key 
                    <select class="browser-default small-select" v-model="tonalities[index]"  disabled>
                        <option v-for="(key, index) in keys" v-bind:value="index"> {{key}} </option>                
                    </select>
                    <a @click="removeItem(index)" class="secondary-content"><i class="material-icons">remove</i></a>
                </li>
            </ul>
        </div>
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
                'tonalities': []
            };
        },        
        props: ['songs', 'keys'],
        mounted: function() {
            var elem = document.getElementById('autocomplete-input');
            this.instance = M.Autocomplete.init(elem, {
                'onAutocomplete': this.foo
            });
            
            var component = this;
            this.songs.forEach(function(element, index){
                var option_name = '#' + element.id + ' ' + element.name;
                component.options[option_name] = '';
                component.mapping[option_name] = index;
            });
            
            this.instance.updateData(this.options);
        },
        methods: {
            foo: function(value){
                var choice = this.mapping[value];
                if(choice != null){
                    this.choices.push(choice);
                    this.tonalities.push(this.songs[choice].chord_id);
                }
            },
            removeItem: function(index){
                this.choices.splice(index, 1);
            }
        }
    }
</script>
