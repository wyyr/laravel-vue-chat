<template>
	<li class="person-chat">
        <div class="meta-group-chat">
            <p class="meta-chat-name">{{ message.user.name }}</p>
            <p class="meta-chat-message">{{ message.content }}</p>
        </div>
    </li>
</template>

<script>
export default {
	props : ['message']
}
</script>