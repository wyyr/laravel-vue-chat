<template>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
        	<form @submit="formSubmit">
                <div class="form-group">
                    <textarea v-model="message" cols="30" rows="4" class="form-control" style="resize: none;" required placeholder="Type Your Message..." id="message" autocomplete="off"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</template>

<script>
import Echo from 'laravel-echo'
export default {
	props: [
        'user_id','name'
    ],
    data() {
    	return {
            id : this.user_id,
    		message : '',
            csrf    : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    	}
    },
    methods: {
    	formSubmit(e) {
    		e.preventDefault();
    		this.$emit('messagesent', {
                id : this.id,
                name : this.name,
                message : this.message
            });
    	}
    }
}
</script>