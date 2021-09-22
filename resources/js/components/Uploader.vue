<template>
    <div></div>
</template>

<script>
import * as FilePond from 'filepond';

export default {
    mounted() {
        const pond = FilePond.create({
            multiple: true,
            name: 'filepond'
        });

        document.body.appendChild(pond.element);
    },

    methods: {
    },
}
</script>
