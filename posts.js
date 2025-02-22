// posts.js
import supabase from "./supabase.js";

async function getPosts() {
    let { data, error } = await supabase.from('knowledge_posts').select('*');
    if (error) console.error("Error fetching posts:", error.message);
    return data;
}

async function addPost(title, content, user_id) {
    const { data, error } = await supabase.from('knowledge_posts').insert([{ title, content, user_id }]);
    if (error) console.error("Error adding post:", error.message);
    return data;
}

export { getPosts, addPost };