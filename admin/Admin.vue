<template>
    <Preloader />
    <MainWrapper />
    <OffsetArea />
</template>
<script>
import Preloader from "./Preloader.vue";
import MainWrapper from "./MainWrapper.vue";
import OffsetArea from "./OffsetArea.vue";

export default {
    components: {
        Preloader,
        MainWrapper,
        OffsetArea,
    },
};
</script>
