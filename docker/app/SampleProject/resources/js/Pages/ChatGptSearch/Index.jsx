import { useState } from 'react';

export default function Index() {

    const [keyword, setKeyword] = useState('');
    const [conversations, setConversations] = useState([]);

    const handleSearch = () => {

        const url = route('chat_gpt_search.list');
        const data = {
            params: { keyword }
        };

        axios.get(url, data)
            .then((response) => {

                setConversations(response.data.conversations);

            });

    };

    return (
        <div className="container mx-auto px-4">
            <div className="flex justify-center items-center my-4">
                <input
                    type="text"
                    value={keyword}
                    onChange={(e) => setKeyword(e.target.value)}
                    className="border border-gray-300 p-2 rounded w-full sm:w-1/2"
                    placeholder="検索キーワードを入力..."
                />
                <button
                    onClick={handleSearch}
                    className="bg-blue-500 text-white px-4 py-2 ml-2 rounded"
                >
                    検索
                </button>
            </div>
            <ul>
                {conversations.map((conversation, index) => (
                    <li key={index} className="mb-6">
                        <div className="bg-gray-100 p-4 rounded">
                            {conversation.author === 'assistant' && conversation.parent && (
                                <div className="mb-2 text-sm text-gray-500">
                                    <div className="font-bold">質問:</div>
                                    <div className="whitespace-pre-wrap">{conversation.parent.message}</div>
                                </div>
                            )}
                            <div className="text-lg mb-2 whitespace-pre-wrap">{conversation.message}</div>
                            {conversation.author === 'user' && conversation.child && (
                                <div className="text-sm text-gray-500">
                                    <div className="font-bold">回答:</div>
                                    <div className="whitespace-pre-wrap">{conversation.child.message}</div>
                                </div>
                            )}
                        </div>
                    </li>
                ))}
            </ul>
        </div>
    );

};