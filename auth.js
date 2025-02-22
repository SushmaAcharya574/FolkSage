// auth.js
import supabase from "./supabase.js";

async function signUp(email, password) {
    const { user, error } = await supabase.auth.signUp({ email, password });
    if (error) console.error("Signup failed:", error.message);
    else console.log("User signed up:", user);
}

async function signIn(email, password) {
    const { user, error } = await supabase.auth.signInWithPassword({ email, password });
    if (error) console.error("Login failed:", error.message);
    else console.log("User logged in:", user);
}

async function signOut() {
    await supabase.auth.signOut();
    console.log("User logged out");
}

export { signUp, signIn, signOut };