type Props = {
  title: string;
  setTitle: React.Dispatch<React.SetStateAction<string>>;

  content: string;
  setContent: React.Dispatch<React.SetStateAction<string>>;
};

export default function Parts({ title, setTitle, content, setContent }: Props) {
  console.log('AppReact/Parts');

  const addText = () => {
    setContent((prev) => prev + "[add text]");
  };

  return (
    <div className="border-2 border-gray-300 p-2">
      <div>MyForm: title</div>

      <input
        value={title}
        onChange={(e) => setTitle(e.target.value)}
        className="app-form-input"
      />

      <div className="mt-2">MyForm: content</div>

      <textarea
        value={content}
        onChange={(e) => setContent(e.target.value)}
        className="app-form-input"
      />

      <div className="mt-5 space-x-2">
        <button className="app-btn-primary" onClick={addText}>
          addText
        </button>
      </div>
    </div>
  );
}
