<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="main-chat">
                <ul class="chat-list">
                    <chat-component
                    v-for="message in messages"
                    :key="message.id"
                    :message="message"
                    ></chat-component>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props : ['messages']
};
</script>
