import { useState, useEffect, useRef } from "react";

export default function AppReact() {
  const [val1, setVal1] = useState(1);

  const initailVal2 = 1;
  const [val2, setVal2] = useState(initailVal2);
  const refVal2 = useRef(initailVal2);

  const list = ["A", "B", "C"];

  useEffect(() => {
    console.log(`useEffect(): val1: ${val1}`);
  }, [val1]);

  const test = () => {
    setVal1((v) => v + 1);
    console.log(`test(): val1: ${val1}`);
  };

  const test2 = () => {
    refVal2.current++;
    setVal2(refVal2.current);
    console.log(`test2(): refVal2: ${refVal2.current}`);
  };

  return (
    <>
      <div className="p-6 text-xl text-red-600">React + Vite + Tailwind</div>
      <div className="space-y-3">
        <div>
          <button type="button" onClick={test} className="app-btn-primary">
            Test
          </button>
          <div>val1: {val1}</div>
        </div>
        <div>
          <button type="button" onClick={test2} className="app-btn-primary">
            Test2
          </button>
          <div>val2: {val2}</div>
        </div>
        <div>
          {true && <div>IF1</div>}
          {false ? <div>IF2 x</div> : <div>IF2</div>}
        </div>
        <div>
          {list.map((value, idx) => (
            <div key={value}>
              idx: {idx}. value: {value}.
            </div>
          ))}
        </div>
      </div>
    </>
  );
}
