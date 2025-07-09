export interface Post {
  id?: number;
  user_id: number;
  title: string;
  content: string;
  created_at?: string;
  updated_at?: string;
}

export interface PostCreate {
  user_id: number;
  title: string;
  content: string;
}

export interface PostUpdate {
  title?: string;
  content?: string;
}
