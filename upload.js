// upload.js
import supabase from "./supabase.js";

async function uploadFile(file) {
    const { data, error } = await supabase.storage.from('uploads').upload(`public/${file.name}`, file);
    if (error) console.error("File upload failed:", error.message);
    return data;
}

export { uploadFile };