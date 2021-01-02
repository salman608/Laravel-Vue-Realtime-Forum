<template>
    <v-container grid-list-xl text-xs-center>
        <v-form @submit.prevent="login">
            <v-text-field
                v-model="form.email"
                label="E-mail"
                type="email"
                required
            ></v-text-field>
            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                required
            ></v-text-field>

            <v-btn color="success" type="submit">
                Submit
            </v-btn>
            <router-link to="/signup">
                <v-btn color="blue">SINGUP</v-btn>
            </router-link>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: ""
            }
        };
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({ name: "forum" });
        }
    },
    methods: {
        login() {
            User.login(this.form)
            this.$router.push({ name: "forum" });
        }
    }
};
</script>

<style></style>
