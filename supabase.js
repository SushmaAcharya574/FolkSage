// supabase.js
const SUPABASE_URL = "https://your-project-url.supabase.co";
const SUPABASE_KEY = "your-anon-key";

const supabase = supabase.createClient(SUPABASE_URL, SUPABASE_KEY);

export default supabase;